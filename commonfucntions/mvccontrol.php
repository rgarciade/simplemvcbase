<?php
class mvcControl {
    public $body = '';
    protected $title = '';
    protected $DB;
    protected $viewName;
    function __construct( $DB = null, $viewName = null ){
        $this->DB = $DB;
        $this->viewName = ($viewName)? $viewName : get_class($this);
    }
    public function fillView( array $model = null,  $title = false, $footter = null){
        $content = file_get_contents(__DIR__."/../views/".$this->viewName.".html");
        if($model){
            foreach ($model as $key => $value) {
                $content = str_replace("%%$key%%",$value,$content);
            }
        }
        if($content && $content != '') $this->addBody($content);
        $this->addTitle(($title)?$title : $this->viewName);
    }
    private function addBody($newhtml){
        $this->body .= $newhtml;
    }
    private function addTitle($newhtml){
        $this->title .= $newhtml;
    }
   
}