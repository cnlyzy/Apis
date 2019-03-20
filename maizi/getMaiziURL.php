<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>获取麦子学院视频真实地址</title>
    </head>
    <body>
        <form  action="" method="post">
            请输入课程的ID：<input type="text" name="id" value="<?php if(!empty($_POST['id'])){echo $_POST['id'];}else{echo "";} ?>">
            <input type="submit" name="dosubmit" value="获取">
        </form>
    </body>
</html>

<?php
class getmaizi{
    private $title;
    private $courseid;
    private $courselist;
    private $videoname;
    private $videourl;

    function __construct($courseid,$show=true){
        $this->courseid=$courseid;
        $this->GetCourseList();
        $this->GetVideoAddress();
        echo "<hr>$this->title<hr>";

        if ($show) {
            foreach ($this->videoname as $value) {
                echo $value,'<br>';
            }

            foreach ($this->videourl as $value) {
                echo $value,'<br>';
            }
        }
        // else {
        //     foreach ($this->videourl as $value) {
        //         echo $value,'<br>';
        //     }
        //}

    }

    private function GetCourseList(){
        $source = file_get_contents("http://www.maiziedu.com/course/$this->courseid/");
        $reg='/(\/course\/'.$this->courseid.'-\d*\/).*?\<span class="fl"\>(.*?)\<\/span\>/';
        $titlereg='/<title>(.*?)<\/title>/i';
        //获取总标题
        preg_match_all($titlereg,$source,$result);
        $this->title=$result[1][0];
        //获取每一课&每一节课的名称
        preg_match_all($reg, $source,$result);
        $this->courselist=$result[1];
        $this->videoname=$result[2];
    }



    private function GetVideoAddress(){
        //打开每一个获得的课程url
        $reg='/lessonUrl = "(.*?)"/';
        foreach ($this->courselist as $list) {
            $source[] = file_get_contents("http://www.maiziedu.com$list");
        }
        $videourl=array();
        // 获取每个课程的视频地址
        //如果获取不到视频地址加上判断
        foreach ($source as $value) {
            preg_match_all($reg, $value ,$result);
            $videourl[] = $result[1][0];
            //var_dump($result);
        }
        $this->videourl=$videourl;
    }

}

if (!empty($_POST['dosubmit'])) {
    $p = new getmaizi($_POST['id']);
}

?>
