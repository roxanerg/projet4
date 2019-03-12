<?php
    namespace App\Model;
    use Core;

class Users extends \Core\Model
{

    /**
     * 
     */
    public function list()
    {
        $sql = 'SELECT * FROM log_admin'; 
        $request = $this->db->query($sql);
        $usersList = $request->fetchAll();
        return $usersList;
    }

    /*public function get($id)
    {
        $request = $this->db->prepare('SELECT * FROM log_admin WHERE id = :id');
        $request->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $request->execute();
        $user = $request->fetchAll();
        
        return $user[0];
    }*/
    public function checkLogin($login, $password)
    {
        $request = $this->db->prepare('SELECT * FROM log_admin WHERE email_admin = ?');
        $request->execute(array($login));
        $result = $request->fetch();
        if (password_verify($password, $result['password_admin'])) {
            if (password_needs_rehash($result['password_admin'], PASSWORD_DEFAULT, [ 'cost' => 12])) {
                $password = password_hash($password, PASSWORD_DEFAULT, [ 'cost' => 12]);
                $this->update($result['id'], $result['email_admin'], $password, $result['name_admin']);
            }
            return true;
        }
        return false;
    }

    function add($mail, $password, $name)
    {
        $password = password_hash($password, PASSWORD_DEFAULT, [ 'cost' => 12]);
        $request = $this->db->prepare('INSERT INTO log_admin (email_admin, password_admin, name_admin) VALUES(:mail_admin, :password_admin, :name_admin)');
        $request->bindParam(':mail_admin', $mail, \PDO::PARAM_STR);
        $request->bindParam(':password_admin', $password, \PDO::PARAM_STR);
        $request->bindParam(':name_admin', $name, \PDO::PARAM_STR);
        $add_user = $request->execute();
        return $add_post;
    }

    function delete($id)
    {
        $this->db->exec('DELETE FROM log_admin WHERE id = '.(int) $id);
    }

    function update($id, $mail, $password, $name)
    {
        $request = $this->db->prepare('UPDATE log_admin SET mail = :mail_admin, password = :password_admin, name = :name_admin WHERE id = :id');
        $request->bindValue(':mail_admin', $mail, \PDO::PARAM_STR);
        $request->bindValue(':password_admin', $password, \PDO::PARAM_STR);
        $request->bindValue(':name_admin', $name, \PDO::PARAM_STR);
        $request->bindValue(':id', $id, \PDO::PARAM_INT);
        $request->execute();
    }
}
