    <table>
        <tr>
            <td>Name</td>
            <td>Surname</td>
            <td>Position</td>
            <td>Phone</td>
            <td>E-Mail</td>
            <td>Birth Date</td>
        </tr>
        <?php
        foreach($this->employees as $employee){
            echo "<tr>";
            echo "<td>".$employee['name']."</td> 
            <td>".$employee['surname']."</td>
            <td>".$employee['position']."</td>
            <td>".$employee['phoneNumber']."</td>
            <td>".$employee['email']."</td>
            <td>".$employee['birthDate']."</td>";
            echo "</tr>";
        }
        ?>
    </table>