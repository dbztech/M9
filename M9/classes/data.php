<?php
class data
{
    public static function getData($tag) {
        $data = database::preparedSelect("SELECT * FROM  `data` WHERE  `tag` =  ?", array($tag));
        $data = $data[0];
        return $data['data'];
    }
    
    public static function dataList() {
        $listdata = database::select("SELECT * FROM  `data` WHERE 1");
        echo '<input type="hidden" name="clientid" value="'.$_COOKIE['clientid'].'" />';
        echo '<table class="table table-bordered">';
        echo '<th>Tag</th><th>Data</th><th>Data Modified</th>';
        foreach ($listdata as $data) {
            echo '<tr>';
            echo '<td><input type="button" class="btn btn-default" value="'.$data['tag'].'" onClick="Data.tag('.$data['id'].')" /></td>';
            echo '<td id="'.$data['id'].'">'.$data['data'].'</td>';
            echo '<td>'.$data['timestamp'].'</td>';
            echo '<td><input type="button" class="btn btn-primary" value="Edit" onClick="Data.edit('.$data['id'].')" /></td>';
            echo '<td><input type="button" value="X" class="btn btn-danger" onClick="Data.delete('.$data['id'].')" /></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
    public static function createData($tag, $data) {
        $sql = "INSERT INTO `data` (`tag`, `data`, `timestamp`, `id`) VALUES (?, ?, CURRENT_TIMESTAMP, NULL);";
        if (database::preparedSelect("SELECT * FROM `data` WHERE `users`.`tag` = ?", array($tag))) {
            #echo "Tag exists";
        } else {
            #echo "Inserted";
            database::preparedInsert($sql, array($tag, $data));
        }
    }
    
    public static function changeTag($id, $new) {
        if (database::preparedSelect("SELECT * FROM `data` WHERE `data`.`tag` = ?", array($tag))) {
            #echo "Tag exists";
        } else {
            #echo "Inserted";
            database::preparedInsert("UPDATE  `data` SET  `tag` =  ? WHERE  `data`.`id` = ?", array($new, $id));
        }
    }
    
    public static function changeData($id, $new) {
        database::preparedInsert("UPDATE  `data` SET  `data` =  ? WHERE  `data`.`id` = ?", array($new, $id));
    }
    
    public static function delete($tag) {
        database::preparedInsert("DELETE FROM `data` WHERE `data`.`id` = ?", array($tag));
    }
}

class cards 
{
    public static function loadCards($cardsToLoad) {
        foreach($cardsToLoad as $currentCard) {
            $filename = "Cards/".$currentCard.".php";
            if ($currentCard == "Data" || $currentCard == "Users") {
                echo '<div class="card homeviews" id="'.$currentCard.'">';
            } else {
                echo '<div class="card" id="'.$currentCard.'">';
            }
            
            #echo $filename;
            if (file_exists($filename)) {
                include($filename);
    	    }
            echo '</div>';
        }
    }
    
    public static function adminPanel() {
        $type = user::getUserType();
        if ($type == "admin") {
            $cards = Array('Data', 'ChangeData', 'CreateData', 'ChangeDataContent', 'ChangeDataTag', 'Users', 'ChangeUsers', 'CreateUsers', 'ChangeUsername', 'ChangeUserPassword', 'ChangeUserType', 'AddGroup');
        } elseif ($type == "standard") {
            $cards = Array('Data', 'ChangeData', 'CreateData', 'ChangeDataContent', 'ChangeDataTag');
        }
        cards::loadCards($cards);
    }
}
?>