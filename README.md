# Consideraciones generales
**Api:** Me concentré en separar las api(externa y local), de esta manera pude realizar las operaciones y mostrar los componentes correspondientes según sea lo solicitado.

**Modelos y Controladores :** Me guié en el concepto "Fat models, skinny controllers", ya que me gusta que los controladores sean más concisos.

**Rutas:** Las rutas están separadas correctamente, lo que pertenece a la api de la aplicación se encuentra en su archivo y las rutas web están en su archivo correspondiente.

**Base de datos:** Utilicé MariaDB, ya que esta es la que actualmente uso para pruebas, no hay más argumentos más allá de ese razonamiento además de que es sumamente ligero puede ser. 

**Componentes Vue js:** Separé los componentes para evitar que estén fuertemente acoplados y poder realizar cambios de una manera más sencilla.

**Comunicación entre componentes:** Me pareció que la mejor manera de manejar este comportamiento fue a través de eventBus, ya que es una aplicación pequeña, de haber sido lo contrario, hubiese considerado utilizar vuex. 

**Manejo de acciones (Consultar datos, eliminar datos):** Todas las operaciones las realicé utilizando axios, me pareció la mejor manera de manejar este tipo de operaciones.

**Nombre BD:** ``  colegio ``

**ejecutar** `` php artisan migrate ``

**No olvidar ejecutar** `` npm install `` 