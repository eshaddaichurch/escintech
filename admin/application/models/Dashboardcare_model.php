<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardcare_model extends CI_Model
{

    private $site_log = 'site_log';   //site log
    private $site_online = 'site_online';   //site log

    function __construct()
    {
    }

    function get_site_data_for_today()
    {
        $results = 0;
        $query = $this->db->query('SELECT SUM(no_of_visits) as visits 
            FROM ' . $this->site_log . ' 
            WHERE DATE(access_date) =DATE(NOW())
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results = $row->visits;
        }

        return $results;
    }

    function get_site_data_for_last_week()
    {
        $results = 0;
        $query = $this->db->query('SELECT SUM(no_of_visits) AS visits
            FROM ' . $this->site_log . '
            WHERE DATE(access_date) >= DATE_SUB(NOW(), INTERVAL 7 DAY)
            AND DATE(access_date) <= DATE_SUB(NOW(), INTERVAL 1 DAY)
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results = $row->visits;
        } else {
            $results = 0;
        }
        return $results;
    }

    function get_site_data_for_last_month()
    {
        $results = 0;
        $query = $this->db->query('SELECT SUM(no_of_visits) as visits
            FROM ' . $this->site_log . '
             WHERE DATE(access_date) >= DATE_SUB(NOW(), INTERVAL 30 DAY)
            AND DATE(access_date) <= DATE_SUB(NOW(), INTERVAL 1 DAY)
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results = $row->visits;
        }
        return $results;
    }


    function get_new_visitor_last_month()
    {
        $results = 0;
        $query = $this->db->query('SELECT count(*) as visits
            FROM ' . $this->site_log . '
             WHERE is_unique=1 and DATE(access_date) >= DATE_SUB(NOW(), INTERVAL 30 DAY)
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results = $row->visits;
        }
        return $results;
    }


    function get_online_visitor()
    {
        $results = 0;
        $query = $this->db->query('SELECT COUNT(*) AS countonline FROM ' . $this->site_online . ' 
            WHERE lastseen > DATE_SUB(NOW(), INTERVAL 10 MINUTE)
            LIMIT 1');
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $results = $row->countonline;
        }
        return $results;
    }

    function get_chart_data_for_today()
    {
        $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%h %p") AS hour
                FROM ' . $this->site_log . '
                WHERE CURDATE()=DATE(access_date)
                GROUP BY HOUR(access_date)');
        if ($query->num_rows() > 0) {
            return $query;
        }
        return NULL;
    }

    function get_chart_data_for_month_year($month = 0, $year = 0)
    {
        if ($month == 0 && $year == 0) {
            $month = date('m');
            $year = date('Y');
            // $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
            //     DATE_FORMAT(access_date,"%d-%m-%Y") AS day 
            //     FROM ' . $this->site_log . '
            //     WHERE MONTH(access_date)=' . $month . '
            //     AND YEAR(access_date)=' . $year . '
            //     GROUP BY DATE(access_date)');

            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day 
                FROM ' . $this->site_log . '
                WHERE DATE(access_date) >= DATE_SUB(NOW(), INTERVAL 30 DAY)
                GROUP BY DATE(access_date)');
            return $query;
        }
        if ($month == 0 && $year > 0) {
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(timestamp,"%M") AS day
                FROM ' . $this->site_log . '
                WHERE YEAR(access_date)=' . $year . '
                GROUP BY MONTH(access_date)');
            return $query;
        }
        if ($year == 0 && $month > 0) {
            $year = date('Y');
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day
                FROM ' . $this->site_log . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            return $query;
        }

        if ($year > 0 && $month > 0) {
            $query = $this->db->query('SELECT SUM(no_of_visits) as visits,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day
                FROM ' . $this->site_log . '
                WHERE MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            return $query;
        }

        return NULL;
    }


    function get_chart_data_for_month_year_new_visitor($month = 0, $year = 0)
    {
        if ($month == 0 && $year == 0) {
            $month = date('m');
            $year = date('Y');
            $query = $this->db->query('SELECT count(*) as visitor,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day 
                FROM ' . $this->site_log . '
                WHERE is_unique = 1 and MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            return $query;
        }
        if ($month == 0 && $year > 0) {
            $query = $this->db->query('SELECT count(*) as visitor,
                DATE_FORMAT(timestamp,"%M") AS day
                FROM ' . $this->site_log . '
                WHERE is_unique = 1 and YEAR(access_date)=' . $year . '
                GROUP BY MONTH(access_date)');
            return $query;
        }
        if ($year == 0 && $month > 0) {
            $year = date('Y');
            $query = $this->db->query('SELECT count(*) as visitor,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day
                FROM ' . $this->site_log . '
                WHERE is_unique = 1 and MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            return $query;
        }

        if ($year > 0 && $month > 0) {
            $query = $this->db->query('SELECT count(*) as visitor,
                DATE_FORMAT(access_date,"%d-%m-%Y") AS day
                FROM ' . $this->site_log . '
                WHERE is_unique = 1 and MONTH(access_date)=' . $month . '
                AND YEAR(access_date)=' . $year . '
                GROUP BY DATE(access_date)');
            return $query;
        }

        return NULL;
    }
}

/* End of file Dashboardcare_model.php */
/* Location: ./application/models/Dashboardcare_model.php */