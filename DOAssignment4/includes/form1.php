<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <meta charset="UTF-8">
    <title></title>        
</head>

<form action="#" method="get">
    
        <legend>&nbsp; SORT FEATURE</legend>

        <label>&nbsp;&nbsp; SORT BY</label>&nbsp;&nbsp;
        
        <select name="sortOption">
            <option value="" disabled selected>Select your option</option>
            <option value="corp">Corporation</option>
            <option value="email">Email</option>
            <option value="id">ID</option>
            <option value="incorp_dt">Incorpt_dt</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
            <option value="zipcode">ZipCode</option>
        </select>
        
        &nbsp;&nbsp;<label>Ascending</label>
        <input type="radio" name="radioOPTION" value="ASC" />
   
        &nbsp;&nbsp; <label>Descending</label>
        <input type="radio" name="radioOPTION" value="DESC" />
        
        <input type="hidden" name="action" value="sort" />
        <input type="hidden" name="sortAction" value="sort" />
        <br/>
        <br/>
        <input type="submit" value="SORT" class="btn-primary"/>
        &nbsp; &nbsp; &nbsp; 
        <button type="reset" class="btn-warning">RESET</button>
        <br/>
        <br/>
    
</form>