<h1>Homepage</h1>
<br/><br/>


<table class="table">
    <thead>
      <tr>
          <th>Schedule a flight</th>
      </tr>
    </thead>
    <tbody>
        <tr>
        <td>From</td>
        <td>To</td>
        </tr>
        <form role="form" action="/flights/schedule" method="post">
            <tr>
                <td>
                    <select id="fromdrop" name="fromdrop">
                        {airportsFrom}
                        <option> {from} </option>
                        {/airportsFrom}
                    </select>
                </td>
                <td>
                    <select id="todrop" name="todrop">
                        {airports}
                        <option> {to} </option>
                        {/airports}
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit"></input>
                    <!--<a href="/schedule/find"><input type="button"> Find my flights </input></a>-->
                </td>
            </tr>
        </form>
    </tbody>
</table>

<p>
</p> 
<h3>Flights Available</h3>
<br/><br/>

<table class="table">
    <thead>
      <tr>
          <th>Date</th>
          <th>Number of Flights available</th>
      </tr>
    </thead>
    {datearr}
      <tr>
          <td>{date}</td>
          <td>{count}</td>
      </tr>
    {/datearr}
</table>

<br/><br/>
<h3>Number of planes in the fleet : {sizeFleet}</h3>
<br/><br/>

<h3>Airports Flights go from/to</h3>
<br/><br/>
<table class="table">
    <thead>
      <tr>
          <th>Base Airport</th>
      </tr>
    </thead>
      <tr>
          <td>{baseAirport}</td>
      </tr>
</table>

<table class="table">
    <thead>
      <tr>
          <th>Destination Airports</th>
      </tr>
    </thead>
    {airports}
      <tr>
          <td>{to}</td>
      </tr>
    {/airports}      
</table>

<style>
ul
{
    font-family: Arial, Verdana;
    font-size: 14px;
    margin: 0;
    padding: 0;
    list-style: none;
}

ul li
{
    display: block;
    position: relative;
    float: left;
}

li ul
{
    display: none;
}

ul li a 
{
    display: block;
    text-decoration: none;
    color: #ffffff;
    border-top: 1px solid #ffffff;
    padding: 5px 15px 5px 15px;
    background: #2C5463;
    margin-left: 1px;
    white-space: nowrap;
}

ul li a:hover 
{
    background: #617F8A;
}
li:hover ul 
{
    display: block;
    position: absolute;
}

li:hover li
{
    float: none;
    font-size: 11px;
}

li:hover a 
{
    background: #617F8A;
}

li:hover li a:hover 
{
    background: #95A9B1;
}    
</style>