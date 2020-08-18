<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PythonController extends Controller
{
    public function chrage(){
        echo "a";
    }

    public function change(){
        /*exec("pip install pandas");
        exec("pip install janome");
        exec("pip install jaconv");
        exec("pip install pathlib");//ここまでモジュール。一回実行したことあるなら消す
        */
        exec("python3 strchange.py",$output,$s);
        $o = $output[0];
        $len = Str::length($o);
        if($len < 44){
        }else{
            $o = Str::replaceFirst("2","",$o);
        }
        $str = Str::replaceFirst("1","",$o);
        $s = Str::replaceLast(".","",$str);
        return $s;//62文字まで

    }

    public function text(String $text){
        $t = fopen("dictext/text.txt","w");
        fwrite($t,$text.".");
        fclose($t);
        $ad = PythonController::stringSplitArray($text, 0, 40);
        $c = 0;
        foreach($ad as $a){
            if($c == 0){
                $t = fopen("dictext/text.txt","w");
                fwrite($t,$a);
                fclose($t);
            }else{
                $t = fopen("dictext/text.txt","a");
                fwrite($t,$a);
                fclose($t);
            }
            $c = 1;
        }
        $t = fopen("dictext/text.txt","a");
        fwrite($t,".");
        fclose($t);
    }
    
    public function test(){
        //exec("ls",$output,$s);
        //print $output[0];
        //return $output[0];
        $text = "図々しい■■の上司あああえああああい";
        $ad = PythonController::stringSplitArray($text, 0, 40);
        $c = 0;
        foreach($ad as $a){
            if($c == 0){
                $t = fopen("dictext/text.txt","w");
                fwrite($t,$a);
                fclose($t);
            }else{
                $t = fopen("dictext/text.txt","a");
                fwrite($t,$a);
                fclose($t);
            }
            $c = 1;
        }
        $t = fopen("dictext/text.txt","a");
        fwrite($t,".");
        fclose($t);
        exec("python3 strchange.py",$output,$s);
        $len = Str::length($output[0]);
        echo $len;
        $x = Str::limit($output[0],$len*2-7);//71.128,,-5.66.118,,,12,8,15
        $x = Str::replaceFirst("1","",$x);
        $x = Str::replaceFirst("2","",$x);
        echo Str::replaceLast("...","",$x);
    }

    public function stringSplitArray($str, $position, $number, $encode = "utf-8"){
        $results = array();
        do
        {
            $cut_str = mb_substr($str, $position, $number, $encode);
            if($cut_str != '')
            {
                $results[] = $cut_str.",";
            }
            
            $position += $number;
        } while($cut_str != '');
        return $results;
    }


}