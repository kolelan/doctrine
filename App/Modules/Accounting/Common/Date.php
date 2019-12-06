<?php
namespace App\Modules\Accounting\Common;
/**
 * Class FrmDate ïğåäñòàâëÿåò äàòó â ğàçëè÷íûõ ôîğìàòàõ
 * Ïğè÷èíà ñîçäàíèÿ - èñïîëüçîâàíèå â ïå÷àòíûõ ôîğìà â ñîîòâåòñòâèè ñ ìàêåòàìè ñîçäàííûìè äèçàéíåğàìè
 * @var $monthArR - ìåñÿö â ğîäèòåëüíîì ïàäåæå
 */
use App\Modules\Accounting\Common\Month;

class Date
{
    private $year;
    private $month;
    private $day;

    /**
     * FrmDate constructor.
     * @param $date - äàòà â ôîğìàòå ÃÃÃÃ-ÌÌ-ÄÄ èëè ÄÄ-ÌÌ-ÃÃÃÃ
     * @param string $delimeter - ğàçäåëèòåëü â äàòå, ïî óìîë÷àíèş [-]
     */
    public function __construct($date,$delimeter='-')
    {

        if (preg_match(('/^[0-9]{4}'.$delimeter.'(0[1-9]|1[0-2])'.$delimeter.'(0[1-9]|[1-2][0-9]|3[0-1])$/'), $date)) {
            $arr_date = explode('-', $date);
            $this->year = $arr_date[0];
            $this->month = $arr_date[1];
            $this->day = $arr_date[2];
        }elseif(preg_match(('/^(0[1-9]|[1-2][0-9]|3[0-1])'.$delimeter.'(0[1-9]|1[0-2])'.$delimeter.'[0-9]{4}$/'), $date)){
            $arr_date = explode('-', $date);
            $this->year = $arr_date[2];
            $this->month = $arr_date[1];
            $this->day = $arr_date[0];
        } else {
            throw new Exception('Error data format passed to class ' . __CLASS__);
        }
    }

    /**
     * Âîçâğàùàåò äàòó â öèôğîâîì âèäå ñ ğàçäåëèòåëÿìè
     * @param bool $revers ïî óìîë÷àíèş true äëÿ âîçâğàòà ÄÄ.ÌÌ.ÃÃÃÃ, false äëÿ âîçâğàòà ÃÃÃÃ.ÌÌ.ÄÄ
     * @param string $delimeter ïî óìîë÷àíèş .
     * @return string ÄÄ.ÌÌ.ÃÃÃÃ | ÃÃÃÃ.ÌÌ.ÄÄ
     */
    public function getDate($revers = true, $delimeter = '.')
    {
        return $revers ? implode($delimeter, [$this->day, $this->month, $this->year]): implode($delimeter, [$this->year, $this->month, $this->day]);
    }

    /**
     * Âîçâğàùàåò äàòó ñ ó÷¸òîì ëîêàëüíîãî íàçâàíèÿ ìåñÿöà â ğîäèòåëüíîì ïàäåæå
     * @param bool $shortMonth - ìîäèôèêàòîğ êîğîòêîãî ôîğìàòà ìåñÿöà
     * @param bool $shortYear - ìîäèôèêàòîğ êîğîòêîãî ôîğìàòà ãîäà
     * @param string $delimeter - ğàçäåëèòåëü
     * @return string ÄÄ ìåñ ÃÃ | ÄÄ ìåñ ÃÃÃÃ | ÄÄ ìåñÿö ÃÃÃÃ
     */
    /**
     * @param bool $shortMonth
     * @param bool $shortYear
     * @param string $delimeter
     * @return string
     */
    public function getLocalDate($shortMonth = false,$shortYear= false, $delimeter = ' ')
    {
        $year = $shortYear ? substr($this->year, -2) : $this->year;
        $month = Month::getGenitive($this->month,$shortMonth);
        $day = $this->day;
        $localDateArray = [$day, $month, $year];
        return implode($delimeter, $localDateArray);
    }

    /**
     * Â ñëó÷àå åñëè îáúåêò áóäåò íàïğÿìóş êîíàêòèíèğîâàòüñÿ òî âåğí¸òñÿ ÃÃÃÃ-ÌÌ-ÄÄ
     * İòî íóæíî äëÿ èñïîëüçîâàíèÿ îáúåêòà êàê ïåğåìåííîé â sql çàïğîñàõ
     * @return string
     */
    public function __toString()
    {
        return $this->getDate(false, '-');
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }
}