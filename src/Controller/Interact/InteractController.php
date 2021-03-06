<?php

namespace Milestone\PD\Controller\Interact;

use Illuminate\Http\Request;
use Milestone\PD\Controller\Controller;

class InteractController extends Controller
{
    protected $controller, $model, $fillable, $pktrs, $pktrsm, $trs, $trsm, $pk;

    public function index(Request $request){
        ini_set('max_execution_time',300);
        $Return = [];
        $Contents = $this->getContent(file_get_contents($request->file('file')));
        foreach((array) $Contents as $Content){
            $this->setProperties($Content['table']);
            $this->pk = $Content['primary_key'];
            $Return[] = $this->run($Content['mode'],$Content['data']);
        }
        return $Return;
    }

    private function getContent($content){
        return json_decode($content,true);
    }

    private function setProperties($table){
        $class = __NAMESPACE__ . "\\" . $table . "Controller"; $controller = $this->controller = new $class;
        $model = $controller->Model;
        $this->model = new $model;
        $this->fillable = $controller->Fillable;
        $this->pktrs = $controller->PrimaryTransform;
        $this->pktrsm = $controller->PrimaryTransformMethod;
        $this->trs = $controller->Transforms;
        $this->trsm = $controller->TransformMethods;
    }

    private function run($mode,$data){
        if(!$this->fillable || empty($this->fillable)) return 'Fillable fields are empty!';
        $method = "do_" . $mode;
        return call_user_func([$this,$method],$data);
    }

    private function do_create($data){
        $this->model->unguard();
        $result = [];
        foreach ($data as $record) $result[$this->getPrimaryKeyCode($record)] = $this->insertData($record);
        return $result;
    }
    private function do_insert($data){ return $this->do_create($data); }

    private function do_update($data){
        $result = [];
        foreach ($data as $record) $result[$this->getPrimaryKeyCode($record)] = $this->updateData($record);
        return $result;
    }
    private function do_edit($data){ return $this->do_update($data); }

    private function do_read($data){
        if(!$data || empty($data)) return $this->getAllData(); $result = [];
        foreach ($data as $record) $result[$this->getPrimaryKeyCode($record)] = $this->getData($record);
        return $result;
    }
    private function do_get($data){ return $this->do_read($data); }

    private function do_delete($data){
        if(!$data || empty($data)) return $result = [];
        foreach ($data as $record) $result[$this->getPrimaryKeyCode($record)] = $this->deleteRecord($record);
        return $result;
    }
    private function do_destroy($data){ return $this->do_delete($data); }
    private function do_remove($data){ return $this->do_delete($data); }

    private function getPrimaryKeyCode($data){
        if(!$this->pk || empty($this->pk)) return microtime(true)*1000000000;
        return is_array($this->pk) ? implode("/",array_only($data,$this->pk)) : array_get($data,$this->pk);
    }

    private function insertData($record){
        return $this->model->create($this->getFillable($record))->id;
    }

    private function updateData($record){
        $pk = $this->controller->getPrimaryValue($record);
        if(!$pk) return null;
        $this->model->find($pk)->forceFill($this->getFillable($record))->save();
        return $pk;
    }

    private function getAllData(){
        return $this->model->all();
    }

    private function getData($record){
        $pk = $this->controller->getPrimaryValue($record);
        if(!$pk) return null;
        return $this->model->find($pk);
    }

    private function deleteRecord($record){
        $pk = $this->controller->getPrimaryValue($record);
        if(!$pk) return null;
        return $this->model->destroy($pk) ? $pk : null;
    }

    private function getFillable($record){
        $trns = $this->trs; $methods = $this->trsm;
        $fillable = [];
        foreach ($this->fillable as $fill){
            if(array_key_exists($fill,$trns)) $fillable[$fill] = $record[$trns[$fill]];
            elseif(array_key_exists($fill,$methods)) $fillable[$fill] = call_user_func([$this->controller,$methods[$fill]],$record);
            elseif(array_key_exists($fill,$record)) $fillable[$fill] = $record[$fill];
        }
        return $fillable;
    }
}
