USE ucode_web;

SELECT res.hero_id, res.points FROM (

    SELECT powers.hero_id, SUM(powers.points) AS points
    FROM powers GROUP BY powers.hero_id

) AS res ORDER BY res.points DESC LIMIT 1;


SELECT res.hero_id, res.points FROM (

    SELECT powers.hero_id, SUM(powers.points) AS points
    FROM powers WHERE powers.type = 'defense'
    GROUP BY powers.hero_id

) AS res ORDER BY res.points ASC LIMIT 1;


SELECT res.hero_id, res.points FROM (

    SELECT powers.hero_id, SUM(powers.points) AS points FROM (

        SELECT hero_id, COUNT(*) FROM teams GROUP BY hero_id HAVING COUNT(*) = 1

    ) as temp INNER JOIN powers ON temp.hero_id = powers.hero_id
    GROUP BY powers.hero_id

) AS res INNER JOIN teams ON res.hero_id = teams.hero_id WHERE teams.name = 'Avengers' ORDER BY res.points DESC;

SELECT teams.name, SUM(powers.points) as total_sum FROM teams 
JOIN powers ON teams.hero_id = powers.hero_id
WHERE teams.name IN ('Avengers', 'Hydra') GROUP BY teams.name
ORDER BY SUM(powers.points);