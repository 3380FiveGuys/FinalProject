/* the actual times would be question marks for user to
enter the date AND the time they want the total for */
SELECT count(*), sum(total) FROM transaction 
	WHERE timedate < "2015/11/8 1:00"
    AND timedate > "2015/11/8 0:15";

/*This is for every sunday in the db*/
SELECT total FROM transaction
	WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = "Sunday";

/*Previous 3 days*/
SELECT sum(total) FROM transaction
	WHERE DATE_FORMAT(CAST(timedate AS date), '%W') = "Sunday"
	ORDER BY DATE_FORMAT(CAST(timedate AS date), '%W') = "Sunday"
	LIMIT 3;

