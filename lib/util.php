<?php

class SysUtil {
    public static function isMod(int $idnum) {
        return in_array($idnum,[
            '1683', //lenteria benjie
            '8163', //negro lixam
            '7716', //bacolot, vanesa mae
            '413', //alampayan, jose ruel
        ], false);
    }
}