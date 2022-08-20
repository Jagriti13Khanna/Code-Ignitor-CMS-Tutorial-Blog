<?php 
class Tutorial_model extends CI_Model 
{ 
    function __construct() 
    { 
        // Call the Model constructor 
        parent::__construct(); 
    }

    public function insert_tutorial($data){
    	$this->db->insert('tutorials',$data);
    }
    public function get_tutorial($id_tutorial){
    	return $this->db->get_where('tutorials',array('id_tutorial'=>$id_tutorial))->row();
    }
    public function get_tutorials(){
    	$this->db->select('*');
        $this->db->from('tutorials');
        $this->db->join('users','tutorials.author_id = users.id' );
        $query = $this->db->get(); 
        if ( $query->num_rows() > 0 )
        { 
            return $query->result(); 
        }
        else
        { 
            return array(); 
        } 
    }
    public function is_owner($id_tutorial,$user_id){
    	 $query = $this->db->get_where('tutorials',array('id_tutorial'=>$id_tutorial));

        $article = $query->row();
        //var_dump($article);
        if($article->author_id == $user_id){
            return true;
        }
        return false;
    }
    public function update_tutorial($id_tutorial,$data){
    	$this->db->where('id_tutorial', $id_tutorial); 
        $this->db->update('tutorials', $data); 
    }
    public function delete($id_tutorial)
    { 
        $this->db->where('id_tutorial', $id_tutorial); 
        $this->db->delete('tutorials'); 
    }
}