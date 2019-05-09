<?php
require_once 'MysqliDb.php';
require_once 'config.php';
$rowCnt=0;

/** 

*  数据导入 

* @param string $file excel文件 

* @param string $sheet 

 * @return string   返回解析数据 

 * @throws PHPExcel_Exception 

 * @throws PHPExcel_Reader_Exception 

*/ 
function importExecl($file='', $sheet=0){  
    global $rowCnt;

    $file = iconv("utf-8", "gb2312", $file);   //转码  

    if(empty($file) OR !file_exists($file)) {  

        die('file not exists!');  

    }  

    include('PHPExcel.php');  //引入PHP EXCEL类  

    $objRead = new PHPExcel_Reader_Excel2007();   //建立reader对象  

    if(!$objRead->canRead($file)){  

        $objRead = new PHPExcel_Reader_Excel5();  

        if(!$objRead->canRead($file)){  

            die('No Excel!');  

        }  

    }  

   

    $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');  

   

    $obj = $objRead->load($file);  //建立excel对象  

    $currSheet = $obj->getSheet($sheet);   //获取指定的sheet表  

    $columnH = $currSheet->getHighestColumn();   //取得最大的列号  

    $columnCnt = array_search($columnH, $cellName);  

    $rowCnt = $currSheet->getHighestRow();   //获取总行数  

    $data = array();  

    for($_row=1; $_row<=$rowCnt; $_row++){  //读取内容  

        for($_column=0; $_column<=$columnCnt; $_column++){  

            $cellId = $cellName[$_column].$_row;  

            $cellValue = $currSheet->getCell($cellId)->getValue();  

             //$cellValue = $currSheet->getCell($cellId)->getCalculatedValue();  #获取公式计算的值  

            if($cellValue instanceof PHPExcel_RichText){   //富文本转换字符串  

                $cellValue = $cellValue->__toString();  

            }  

   

            $data[$_row][$cellName[$_column]] = $cellValue;  

        }  

    }  

   
    return $data;
}

function insertClass($ExcelData,$num){
    global $dbhost;
    global $dbuser;
    global $dbpwd;
    global $dbname;
    $db = new MysqliDb($dbhost, $dbuser, $dbpwd, $dbname);
    $newacademy=0;$newclass=0;$newteacher=0;$newtype=0;
    for($i=2;$i<$num;$i++){
        $classname=$ExcelData[$i]['A'];
        $classscore=$ExcelData[$i]['B'];
        $classmode=$ExcelData[$i]['C'];
        $teachername=$ExcelData[$i]['D'];
        $classtime=$ExcelData[$i]['F'];
        $classcode='';
        $classcodepattern='/(?<=\)-).*?(?=-)/';//选课代码正则匹配
        preg_match($classcodepattern,$ExcelData[$i]['E'], $classcode);
        $teachercode='';
        $teachercodepattern='/(?<='.$classcode[0].'-).*?(?=-)/';
        preg_match($teachercodepattern,$ExcelData[$i]['E'], $teachercode);
        $academyname=$ExcelData[$i]['G'];
        //echo $classname.' '.$classscore.' '.$classmode.' '.$teachername.' '.$classtime.' '.$classcode[0].' '.$teachercode[0].' '.$academyname.' '.'<br>';
        $aid=0;
        $tid=0;
        $tyid=0;
        $db->where('Type',$classmode);
        if(!$db->has('type_list')){
            $tydt=array();
            $tydt['Type']=$classmode;
            $tyid=$db->insert('type_list',$tydt);
            $newtype++;
        }else{
            $db->where('Type',$classmode);
            $tyone=$db->getOne('type_list');
            $tyid=$tyone['ID'];
        }

        $db->where('Academy',$academyname);
        if(!$db->has('academy_list')){
            $adt=array();
            $adt['Academy']=$academyname;
            $aid=$db->insert('academy_list',$adt);
            $newacademy++;
        }else{
            $db->where('Academy',$academyname);
            $aone=$db->getOne('academy_list');
            $aid=$aone['ID'];
        }

        $db->where('WorkNumber',$teachercode[0]);
        if(!$db->has('teacher')){
            $tdt=array();
            $tdt['WorkNumber']=$teachercode[0];
            $tdt['TeacherName']=$teachername;
            $tdt['TeacherSchool']=$aid;
            $tdt['Score']=0;
            $tid=$db->insert('teacher',$tdt);
            $newteacher++;
        }else{
            $db->where('WorkNumber',$teachercode[0]);
            $tone=$db->getOne('teacher');
            $tid=$tone['TeacherID'];
        }
        $db->where('Code',$classcode[0]);
        $db->where('TeacherID',$tid);
        if(!$db->has('class')){
            $cdt=array();
            $cdt['Name']=$classname;
            $cdt['Code']=$classcode[0];
            $cdt['ClassTime']=$classtime;
            $cdt['Type']=$tyid;
            $cdt['School']=$aid;
            $cdt['TeacherID']=$tid;
            $cdt['Point']=$classscore;
            $db->insert('class',$cdt);
            $newclass++;
        }
    }

    echo '成功导入'.$newclass.'条课程;'.$newtype.'条课程类别;'.$newteacher.'位老师;'.$newacademy.'个学院';
    //$classcodepattern='(?<=\)-).*?(?=-)';//选课代码正则匹配
    //preg_match($classcodepattern, $mail, $classcode);
    //$teachercodepattern='(?<='.$classcode.'-).*?(?=-)';
    //preg_match($teachercodepattern, $mail, $teachercode);
}
function insertTeacher(){

}
function insertAcademy(){

}
$a=array();
$a=importExecl('./1.xlsx',0);
insertClass($a,$rowCnt);
echo '读入'.$rowCnt.'条数据<br>';
?>