<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;


final class DateTimeSpanishTest extends TestCase {

	private DateTime $date1;

	private DateTimeSpanish $date2;


	public function setUp() : void {
		$this->date1 = new DateTime;
		$this->date2 = new DateTimeSpanish;

		$date = [2020, 1, 6];
		$this->date1->setDate(...$date);
		$this->date2->setDate(...$date);
	}


	/**
	 * @covers DateTimeSpanish
	 */
	public function testFull() : void {
		$format = 'l, d F Y';
		$this->assertEquals('Monday, 06 January 2020', $this->date1->format($format));
		$this->assertEquals('Lunes, 06 Enero 2020', $this->date2->format($format));
	}


	/**
	 * @covers DateTimeSpanish
	 */
	public function testShort() : void {
		$format = 'D, d M Y';
		$this->assertEquals('Mon, 06 Jan 2020', $this->date1->format($format));
		$this->assertEquals('Lun, 06 Ene 2020', $this->date2->format($format));
	}


	/**
	 * @covers DateTimeSpanish
	 */
	public function testNegativeLookbehind() : void {
		$this->assertEquals('F for January', $this->date1->format('\F \f\o\r F'));
		$this->assertEquals('F para Enero', $this->date2->format('\F \p\a\r\a F'));
	}

}
