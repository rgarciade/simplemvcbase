<?php
class mvcPreview {
    protected $html = "
    <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' type='text/css' href='../public/css/commoncss.css'>
            %%CSS%%
            <script src='../public/js/commonjs.js'></script>
            %%JS%%
            <title>%%TITLE%%</title>
        </head>
        <body>
            %%BODY%%
        </body>
    </html>";
    function __construct( $title ){
        $this->title = $title;
    }
    public function printView(){
        //ob_end_clean();
        echo $this->html;

    }
    public function composeHtml( array $views = null, array $cssRoutes = null, array $jsRoutes = null ){
        $css = '';
        $js = '';
        $body = '';
        if($cssRoutes){
            for ($i=0; $i < count($cssRoutes) ; $i++) { 
                 $css .= "<link rel='stylesheet' type='text/css' href='../public/css/".$cssRoutes[$i].".js'>";
            }
        }
        if($jsRoutes){
            for ($i=0; $i < count($jsRoutes) ; $i++) { 
                $js .= "<script src='../public/js/".$jsRoutes[$i].".js'></script>";
            }
        }
        if($views){
            for ($i=0; $i < count($views) ; $i++) { 
                $body .= $views[$i]->body;
            }
        }


        $this->html = str_replace('%%TITLE%%',$this->title,$this->html);
        $this->html = str_replace('%%BODY%%',$body,$this->html); 
        $this->html = str_replace('%%JS%%',$js,$this->html); 
        $this->html = str_replace('%%CSS%%',$css,$this->html); 
    }
    public function composeAndPreview( array $views = null, array $cssRoutes = null, array $jsRoutes = null ){
        $this->composeHtml( $views, $cssRoutes, $jsRoutes);
        $this->printView();
    }
}