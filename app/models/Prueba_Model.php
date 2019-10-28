<?php
class Prueba_Model
{

    public function __construct()
    {
        $this->db = new Base;
    }

    public function getSucursal()
    {
        $this->db->query("SELECT * FROM sucursal");
        return $this->db->getAll();
    }

    public function registerSucursal($datos)
    {
        $sql = "INSERT INTO `sucursal` (chr_sucucodigo,vch_sucunombre,vch_sucuciudad,vch_sucudireccion,int_sucucontcuenta) VALUES(:id,:d1,:d2,:d3,:d4)";
        $this->db->query($sql);
        $this->db->bind(':id', $datos[0]);
        $this->db->bind(':d1', $datos[1]);
        $this->db->bind(':d2', $datos[2]);
        $this->db->bind(':d3', $datos[3]);
        $this->db->bind(':d4', '0');
        $this->db->execute();
    }
}
