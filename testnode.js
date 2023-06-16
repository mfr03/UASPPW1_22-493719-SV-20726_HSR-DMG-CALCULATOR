var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: 'hsr_calc_prj'
});

con.connect(function(err) {
  if (err) throw err;
  con.query("SELECT * from character_skills where character_name_id = 'Seele'", function(err, result, fields)
  {
    if(err) throw err;
    console.log(result[0]);
  });
});


