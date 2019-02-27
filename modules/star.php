<?php
class star{
    private $star1,$star2,$star3,$star4,$star5;
    public function GenerateStar($num,$class=""){
        $score = intval($num);
        if($score>=0&&$score<=10){
        switch($score){
            case 0:
            $this->star1='star_border';
            $this->star2='star_border';
            $this->star3='star_border';
            $this->star4='star_border';
            $this->star5='star_border';
            break;
            case 1:
            $this->star1='star_half';
            $this->star2='star_border';
            $this->star3='star_border';
            $this->star4='star_border';
            $this->star5='star_border';
            break;
            case 2:
            $this->star1='star';
            $this->star2='star_border';
            $this->star3='star_border';
            $this->star4='star_border';
            $this->star5='star_border';
            break;
            case 3:
            $this->star1='star';
            $this->star2='star_half';
            $this->star3='star_border';
            $this->star4='star_border';
            $this->star5='star_border';
            break;
            case 4:
            $this->star1='star';
            $this->star2='star';
            $this->star3='star_border';
            $this->star4='star_border';
            $this->star5='star_border';
            break;
            case 5:
            $this->star1='star';
            $this->star2='star';
            $this->star3='star_half';
            $this->star4='star_border';
            $this->star5='star_border';
            break;
            case 6:
            $this->star1='star';
            $this->star2='star';
            $this->star3='star';
            $this->star4='star_border';
            $this->star5='star_border';
            break;
            case 7:
            $this->star1='star';
            $this->star2='star';
            $this->star3='star';
            $this->star4='star_half';
            $this->star5='star_border';
            break;
            case 8:
            $this->star1='star';
            $this->star2='star';
            $this->star3='star';
            $this->star4='star';
            $this->star5='star_border';
            break;
            case 9:
            $this->star1='star';
            $this->star2='star';
            $this->star3='star';
            $this->star4='star';
            $this->star5='star_half';
            break;
            case 10:
            $this->star1='star';
            $this->star2='star';
            $this->star3='star';
            $this->star4='star';
            $this->star5='star';
            break;
            default:
            echo "暂无";
            exit;
            break;
        }
        echo <<<star
            <i class="mdui-icon material-icons {$class}">{$this->star1}</i>
            <i class="mdui-icon material-icons {$class}">{$this->star2}</i>
            <i class="mdui-icon material-icons {$class}">{$this->star3}</i>
            <i class="mdui-icon material-icons {$class}">{$this->star4}</i>
            <i class="mdui-icon material-icons {$class}">{$this->star5}</i>
star;
    }else{
        echo "暂无";
        exit;
    }

    }
}
?>