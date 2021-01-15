<?php

require_once 'Repository.php';

class LogRepository extends Repository {
    public function addLog($id, $data) : void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO "Log" (id_users, browser, datetime, device, "status") 
            VALUES (?, ?, ?, ?, ?)
        ');

        $date = new DateTime();
        $stmt->execute([
            $id,
            $this->browserName(),
            $date->format('Y-m-d H:i:s'),
            $this->isMobile(),
            $data
        ]);
    }


    private function isMobile() : string {
        if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"])){
            return "Mobile device";
        }
        return "Laptop/PC";
    }


    private function browserName() {

        $ExactBrowserNameUA=$_SERVER['HTTP_USER_AGENT'];

        if (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")) {
            // OPERA
            $ExactBrowserNameBR="Better than Pacman";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "chrome/")) {
            // CHROME
            $ExactBrowserNameBR="Ram Pacman";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "msie")) {
            // INTERNET EXPLORER
            $ExactBrowserNameBR="Crap";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "firefox/")) {
            // FIREFOX
            $ExactBrowserNameBR="Best Browser Ever";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")==false and strpos(strtolower($ExactBrowserNameUA), "chrome/")==false) {
            // SAFARI
            $ExactBrowserNameBR="paid as usually";
        } else {
            // OUT OF DATA
            $ExactBrowserNameBR="idk";
        };
        return $ExactBrowserNameBR;
    }
}