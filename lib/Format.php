<?php
class Format{

        public function formatDate($date){
            return date('F j, Y, g:i a', strtotime($date));
        }
        public function formatYear($date){
            return date('F j, Y', strtotime($date));
        }
        public function datePicker($date){
            return date("Y-m-d",strtotime($date));;
        }
        public function reverseDatePicker($date){
            return date("m/d/Y",strtotime($date));;
        }
        public function humanTiming($time){
            $time = time() - $time; // to get the time since that moment
            $time = ($time<1)? 1 : $time;
            $tokens = array (
                31536000 => 'year',
                2592000 => 'month',
                604800 => 'week',
                86400 => 'day',
                3600 => 'hour',
                60 => 'minute',
                1 => 'second'
            );

            foreach ($tokens as $unit => $text) {
                if ($time < $unit) continue;
                $numberOfUnits = floor($time / $unit);
                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s ':' ').'ago';
            }

        }
        public function textImplode($text){
            return  implode(",", $text);
        }
        public function textShorten($text, $limit = 400){
            $text = $text." ";
            $text = substr($text, 0, $limit);
            $text = substr($text, 0, strrpos($text, ' '));
            $text = $text.".....";
            return $text;
        }
        public function validation($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        public function slug($string){
            $string = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($string)));
            return $string;
        }
        public function title(){
            $path = $_SERVER['SCRIPT_FILENAME'];
            $title = basename($path, '.php');
            $title = str_replace('_', ' ', $title);
            if($title == 'index'){
                $title = 'home';
            }elseif($title == 'contact'){
                $title = 'contact';
            }
            return $title = ucfirst($title);
        }

    }
?>