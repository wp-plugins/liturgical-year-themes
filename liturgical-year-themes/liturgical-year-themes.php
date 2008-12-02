<?php
/*
Plugin Name: Liturgical Year Themes
Version: 1
Plugin URI: http://scottlenger.com/development/liturgical-year-themes-wordpress-plugin
Description: Adds a stylesheet for the day or season of the Liturgical year.
Author: Scott Lenger
Author URI: http://scottlenger.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/


function get_liturgical_time($type = '') {
	
	// get today's date
	$date = date(z);
	$date = $date+1; // add one so we start at 1 instead of 0

	// determine the date of Easter
	$easter = easter_days(); // number of days past March 21
	$easter = $easter+80; // March 21 is the 80th day of the year
	if ( date(L) == 1 ) {$easter = $easter+1;} // if leap year add 1 since march 21 falls after the leap day

	if ( $date <= 5 ) {
		$name = 'christmas';
		$title = 'Christmas';
	} elseif ( $date == 6 ) {
		$name = 'epiphany';
		$title = 'Epiphany';
	} elseif ( $date < ( $easter-49 ) ) {
		$name = 'after-epiphany';
		$title = 'After Epiphany';
	} elseif ( $date >= 305 ) { 
		if ( date(L) == 1 ) {$date = $date-1;} // compensate for leap year: subtracting 1 from $date achieves the same ends as		 increasing each hard coded date by one.
		if ( $date >= 359 ) { // Christmas, Dec 25 - 31
			$name = 'christmas';
			$title = 'Christmas';
		} elseif ( $date == 358 ) { // Christmas Eve, Dec 24
			$name = 'christmas-eve';
			$title = 'Christmas Eve';
		} elseif ( $date >= 355 ) { // Advent, Dec 21 - 23
			$name = 'advent';
			$title = 'Advent';
		} elseif ( $date >= 348 ) { // 3rd Wk of Advent, Dec 14 - Dec 20
			$name = 'third-week-of-advent';
			$title = 'The 3rd Week of Advent';
		} elseif ( $date >= 334 ) { // Advent, Nov 30 - Dec 13
			$name = 'advent';
			$title = 'Advent';
		} elseif ( $date >= 326 ) { // Feast of Christ the King
			$name = 'christ-the-king';
			$title = 'Christ the King';
		} elseif ( $date == 305 ) {
			$name = 'all-saints-day';
			$title = 'All Saints Day';
		} else {
			$name = 'Ordinary Time';
			$title = 'Ordinary Time';	
		}
	} elseif ( $date >= ( $easter+63 ) ) {
		$name = 'ordinary-time';
		$title = 'Ordinary Time';	
	} elseif ( $date >= ( $easter+56 ) ) {
		$name = 'trinity-sunday';
		$title = 'Trinity Sunday';
	} elseif ( $date >= ( $easter+49 ) ) {
		$name = 'pentecost';
		$title = 'Pentecost Sunday';
	}  elseif ( $date == ( $easter+39 ) ) {
		$name = 'ascension';
		$title = 'Ascension Day';
	} elseif ( $date >= ( $easter+7 ) ) {
		$name = 'eastertide';
		$title = 'Eastertide';
	} elseif ( $date == $easter ) {
		$name = 'resurrection-sunday';
		$title = 'Resurrection Sunday';	
	} elseif ( $date > $easter ) {
		$name = 'easter';
		$title = 'Easter';
	} elseif ( $date == ( $easter-1 ) ) {
		$name = 'holy-saturday';
		$title = 'Holy Saturday';
	} elseif ( $date == ( $easter-2 ) ) {
		$name = 'good-friday';
		$title = 'Good Friday';
	} elseif ( $date == ( $easter-3 ) ) {
		$name = 'maundy-thursday';
		$title = 'Maundy Thursday';
	} elseif ( $date == ( $easter-7 ) ) {
		$name = 'palm-sunday';
		$title = 'Palm Sunday';	
	} elseif ( $date >= ( $easter-45 ) ) {
		$name = 'lent';
		$title = 'lent';	
	} elseif ( $date == ( $easter-46 ) ) {
		$name = 'ash-wednesday';
		$title = 'Ash Wednesday';
	} elseif ( ( $date == ( $easter-47 ) ) || ( $date == ( $easter-48 ) ) || ( $date == ( $easter-49 ) ) ) {
		$name = 'transfiguration';
		$title = 'Transfiguration';
	} else {
		$name = 'default';
		$title = 'Default';
	}
	
	// output	
	if ( $type == 'title' ) {
		echo $title;
	} elseif ( $type == 'name' ) {
		echo $name;
	} else {
		echo '<link type="text/css" rel="stylesheet" href="'.get_bloginfo('template_directory').'/liturgy/'.$name.'.css" />';
	}
} 

?>