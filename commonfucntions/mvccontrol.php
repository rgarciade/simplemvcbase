<?php
class mvc {
    private $body = '';
    private $title = '';
    private $DB;
    private $viewName;
    private $commonHtml;
    private $html = "
    <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>%%TITLE%%</title>
        </head>
        <body>
            %%BODY%%
        </body>
    </html>";
    function __construct( $DB = null, $viewName = null ){
        $this->DB = $DB;
        $this->viewName = ($viewName)? $viewName : get_class($this);
    }
    public function fillView( array $model, $commonHtml = false, $title = false, $footter = null){
        $this->commonHtml = $commonHtml;
        $content = file_get_contents(__DIR__."/../views/".$this->viewName.".html");
        foreach ($model as $key => $value) {
            $content = str_replace("%%$key%%",$value,$content);
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
    public function printView(){
        //ob_end_clean();
        if($this->commonHtml){
            $this->html = str_replace('%%TITLE%%',$this->title,$this->html);
            $this->html = str_replace('%%BODY%%',$this->body,$this->html);
            echo $this->html;
        }else{
            echo $this->body;
        }
    }
}