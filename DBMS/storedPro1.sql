

create procedure spPlayer_Search
as
begin
	SELECT * FROM `player` WHERE `FNAME` LIKE '%$first%' AND `LNAME` LIKE '%$last%'
	
end