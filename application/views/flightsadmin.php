<h1>Flights</h1>
{modebutton}
<br/><br/>
<table class="table">
    <tr>
        <th>
            Aircraft Code
        </th>
        <th>
            From
        </th>
        <th>
            To
        </th>
        <th>
            Date
        </th>
        <th>
            Departure
        </th>
        <th>
            Arrival
        </th>
        <th>
            Distance
        </th>
    </tr>  
    {flights}
    <tr>
        <td>
            <a style="text-decoration: none; color:black;" ref="#" title="The aircraft code is a unique identifier for the aircraft involved in a flight.">
            <a href="/flights/edit/{id}"><input type="button" value="{id}"/></a>
            </a>
        </td>
        <td>
            {from}
        </td>
        <td>
            {to}
        </td>
        <td>
            {date}
        </td>
        <td>
            {departure}
        </td>
        <td>
            {arrival}
        </td>
        <td>
            {distance}
        </td>
    </tr>
    {/flights}
    
</table>