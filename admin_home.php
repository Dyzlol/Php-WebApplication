<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Administration</title>
        <link rel="stylesheet" type="text/css" href="mainstyle.css">
    </head>
    <body>
      <h1>Applications</h1>
      <form action="draw_table.php" method="post">
          <label>Select fields to display</label></br>
          <select name="selections" multiple size="5">
              <option value="name"><label>email</label></option>
              <option value="email"><label>name</label></option>
              <option value="gpa"><label>gpa</label></option>
              <option value="year"><label>year</label></option>
              <option value="gender"><label>gender</label></option>
          </select><br/><br/>
          <label>Select field to sort applications</label>
              <select name="sortby">
                  <option value="name"><label>name</label></option>
                  <option value="email"><label>email</label></option>
                  <option value="gpa"><label>gpa</label></option>
                  <option value="year"><label>year</label></option>
                  <option value="gender"><label>gender</label></option>
              </select><br/><br/>
          <label>Filter Condition&nbsp;</label><input type="text" width="30" name="filter"/><br/><br/>
          <input type="submit" name="submit" value="Display Applications"/><br/><br/>
      </form>
      <form action="main.html"><input type="submit" value="Return to main menu"/></form>
    </body>
  </html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
