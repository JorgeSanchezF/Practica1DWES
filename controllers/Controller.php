<?php
interface Controller
{
    #funcion abstracta index que muestra todos los elementos (coches) en una tabla
    public static function index();

    #funcion abstracta create que muestra un formulario
    public static function create();

    #funcion abstracta save que inserta datos con un post
    public static function save();

    #funcion abstracta edit que recibe un id y muestra un formulario
    public static function edit($id);
    #funcion abstractaque recibe un id cambia los datos con un post de un fromulario
    public static function update($id);
    #funcion abstracta que recibe id elimina algo de la BD
    public static function destroy($id);
}
