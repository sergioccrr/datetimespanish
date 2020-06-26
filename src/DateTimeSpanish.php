<?php

/*
 * This file is part of DateTimeSpanish package.
 *
 * (c) 2020 Sergio Cruz
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class DateTimeSpanish extends DateTime {

	const DAYS = [
		 'Lunes'
		,'Martes'
		,'Miércoles'
		,'Jueves'
		,'Viernes'
		,'Sábado'
		,'Domingo'
	];

	const MONTHS = [
		 'Enero'
		,'Febrero'
		,'Marzo'
		,'Abril'
		,'Mayo'
		,'Junio'
		,'Julio'
		,'Agosto'
		,'Septiembre'
		,'Octubre'
		,'Noviembre'
		,'Diciembre'
	];


	private function replace_textual(array $matches) : string {
		$char  = $matches[0];
		$isDay = ($char === 'l' || $char === 'D');

		$key = parent::format($isDay ? 'N' : 'n') - 1;
		$str = $isDay ? self::DAYS[$key] : self::MONTHS[$key];

		if ($char === 'D' || $char === 'M') {
			$str = substr($str, 0, 3);
		}

		$str = str_split($str);
		$str = '\\'. implode('\\', $str);

		return $str;
	}



	public function format($format) : string {
		$format = preg_replace_callback('#(?<!\\\\)[F|M|l|D]#', [$this, 'replace_textual'], $format);
		$str = parent::format($format);
		return $str;
	}

}
