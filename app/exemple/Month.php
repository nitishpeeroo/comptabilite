<?php

/**
 * http://php.net/manual/fr/dateinterval.format.php
 */

namespace Calendar;

class Month {

    public $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    public $month;
    public $year;

    /**
     * Month Constructor
     * @param int $month Le mois entre 1 et 12
     * @param int $year L'année
     * @throws \Exception
     */
    public function __construct(int $month = null, int $year = null) {
        if ($month === null) {
            $month = intval(date('m'));
        }
        if ($year === null) {
            $year = intval(date('Y'));
        }

        if ($month < 1 || $month > 12) {
            throw new \Exception("Le mois $month n'est pas valide");
        }
        $this->month = $month;
        $this->year = $year;
    }

    /**
     * Retourne le mois en toute lettre
     * @return string Le mois et l'année
     */
    public function toString(): string {
        return $this->months[$this->month - 1] . " " . $this->year;
    }

    /** Renvoie  le nombre de semaine dans le mois
     * http://php.net/manual/fr/book.datetime.php
     * @return int
     */
    public function getWeeks(): int {
        $start = $this->getStartingDay();
        /**
         * Date de fin de mois : 27,28,30,31 ???
         */
        $end = (clone $start)->modify('+1 month -1 day');
        /**
         * faire un test en janvier 2017 et décembre 2018
         */
        $end = $end->format('W') === "01" ? "53" : $end->format('W');

        $weeks = intval($end) - intval($start->format('W')) + 1;
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }

    /**
     * Renvoie le premier jour du mois
     */
    public function getStartingDay(): \DateTime {
        return new \DateTime("{$this->year}-{$this->month}-01");
    }

    /**
     * Est-ce que le jour est dans le mois ?
     * @return  bool
     */
    public function withInMonth(\DateTime $date): bool {
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }

    /**
     * Renvoie le mois suivant
     * @return \App\Date\Month
     */
    public function nextMonth(): Month {
        $month = $this->month + 1;
        $year = $this->year;
        if ($month > 12) {
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }

    /**
     * Renvoie le mois précédent
     * @return \App\Date\Month
     */
    public function previousMonth(): Month {
        $month = $this->month - 1;
        $year = $this->year;
        if ($month < 1) {
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }

}
