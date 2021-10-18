<?php


class ItemCRUDModel extends CI_Model{

    public function get_itemCRUD(){
        if(!empty($this->input->get("search"))){
          $this->db->like('nom', $this->input->get("search"));
          $this->db->or_like('couleur', $this->input->get("search")); 
        }
        $query = $this->db->get("produits");
        return $query->result();
    }


    public function insert_item()
    {    
        $data = array(
            'nom' => $this->input->post('nom'),
            'couleur' => $this->input->post('couleur')
        );
        return $this->db->insert('produits', $data);
    }


    public function update_item($id) 
    {
        $data=array(
            'nom' => $this->input->post('nom'),
            'couleur'=> $this->input->post('couleur')
        );
        if($id==0){
            return $this->db->insert('produits',$data);
        }else{
            $this->db->where('id',$id);
            return $this->db->update('produits',$data);
        }        
    }


    public function find_item($id)
    {
        return $this->db->get_where('produits', array('id' => $id))->row();
    }


    public function delete_item($id)
    {
        return $this->db->delete('produits', array('id' => $id));
    }
}
?>