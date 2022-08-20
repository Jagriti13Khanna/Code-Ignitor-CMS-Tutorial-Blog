<!-- models/Crud_model.php  -->
<?php 
class Crud_model extends CI_Model 
{ 
    function __construct() 
    { 
        // Call the Model constructor 
        parent::__construct(); 
    } 
    function get_articles()
    { 
        $query = $this->db->get('ci_articles'); 
        if ( $query->num_rows() > 0 )
        { 
            return $query->result(); 
        }
        else
        { 
            return FALSE; 
        } 
    }
    // function get_animal_detail($id)
    // { 
    //     $this->db->where('animal_id', $id); 
    //     $query = $this->db->get('ci_articles'); 
    //     if ( $query->num_rows() > 0 )
    //     { 
    //         return $query->result(); 
    //     }
    //     else
    //     { 
    //         return FALSE; 
    //     } 
    // } 
    // function insert_animal($data)
    // { 
    //     $this->db->insert('ci_articles', $data); 
    // }
}