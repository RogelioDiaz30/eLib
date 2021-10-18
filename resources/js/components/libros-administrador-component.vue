<template>
  <div>
    <div class="header bg-gradient-info pt-5 pt-md-6">
      <div class="container-fluid">
        <!--Header-->

        <div class="header pb-6">
          <div class="container-fluid">
            <div class="header-body">
              <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                  <h6 class="h2 text-white d-inline-block mb-0">Libros</h6>
                  <nav
                    aria-label="breadcrumb"
                    class="d-none d-md-inline-block ml-md-4"
                  >
                    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                      <li class="breadcrumb-item">
                        <a><i class="fas fa-home"></i></a>
                      </li>
                      <li class="breadcrumb-item"><a>Inicio</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Libros
                      </li>
                    </ol>
                  </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                  <button
                    type="button"
                    class="btn btn-sm btn-neutral"
                    @click="nuevoLibro()"
                    data-toggle="modal"
                    data-target="#modal-form"
                    id="nuevoLibro"
                  >
                    <i class="fas fa-plus"></i> Nuevo Libro
                  </button>
                  <button
                    type="button"
                    class="btn btn-sm btn-neutral"
                    @click="obtenerLibros"
                  >
                    Recargar Libros
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--CONTENIDO-->

    <div class="col-md-4">
      <!--<button
        type="button"
        class="btn btn-block btn-default"
        data-toggle="modal"
        data-target="#modal-form"
      >
        Registrar Libro
      </button>-->
      <div
        class="modal fade"
        id="modal-form"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modal-form"
        aria-hidden="true"
      >
        <div
          class="modal-dialog modal- modal-dialog-centered modal-lg"
          role="document"
        >
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-12 py-lg-12">
                  <h6 class="h2 text-black m-auto display-4 text-center">
                    Registrar Libro
                  </h6>
                  <form>
                    <!--<div class="alert alert-success" role="alert">
                      <strong>Completado!</strong> {{ v_error }}
                    </div>-->
                    <div class="card mb-3 bg-secondary">
                      <div class="row g-0">
                        <div class="col-md-4">
                          <img
                            class="card-img-top"
                            :src="'/storage/' + libro.rutaImagen"
                            alt="No hay Imagen disponible"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="text-center"></div>
                                  <input
                                    type="file"
                                    class="form-control"
                                    id="file"
                                    accept="image/*"
                                    @change="getArchivos"
                                  />
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="titulo"
                                    placeholder="Titulo"
                                    v-model="libro.titulo"
                                  />
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input
                                    type="text"
                                    placeholder="Autor"
                                    class="form-control"
                                    id="autor"
                                    v-model="libro.autor"
                                  />
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <input
                                    type="text"
                                    placeholder="Editorial"
                                    class="form-control"
                                    id="editorial"
                                    v-model="libro.editorial"
                                  />
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <input
                                    type="text"
                                    placeholder="Genero"
                                    class="form-control"
                                    id="genero"
                                    v-model="libro.genero"
                                  />
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <input
                                    type="text"
                                    placeholder="ISBN"
                                    class="form-control"
                                    id="isbn"
                                    v-model="libro.isbn"
                                  />
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <input
                                    type="text"
                                    placeholder="Estanteria"
                                    class="form-control"
                                    id="estanteria"
                                    v-model="libro.estanteria"
                                  />
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <input
                                    type="text"
                                    placeholder="Estatus"
                                    class="form-control"
                                    id="estatus"
                                    v-model="libro.estatus"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button
                      type="button"
                      class="btn btn-default btn-lg"
                      data-dismiss="modal"
                      @click="guardarLibro"
                    >
                      Registrar
                    </button>
                    <button
                      type="button"
                      class="btn btn-link ml-auto"
                      data-dismiss="modal"
                    >
                      Cerrar
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div>
      <div class="container-fluid mt--7">
        <div class="row">
          <div class="col">
            <div class="card bg-secondary shadow">
              <div class="table-responsive">
                <table class="table align-items-center table-lg">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Titulo</th>
                      <th scope="col">Autor</th>
                      <th scope="col">Editorial</th>
                      <th scope="col">Genero</th>
                      <th scope="col">ISBN</th>
                      <th scope="col">Estanteria</th>
                      <th scope="col">Estatus</th>
                    </tr>
                  </thead>
                  <paginate
                    name="vplibros"
                    :per="3"
                    :list="lista_libros"
                    tag="tbody"
                    v-if="lista_libros.length"
                  >
                    <tr
                      v-for="v_libro in paginated('vplibros')"
                      :key="v_libro.id"
                    >
                      <td>
                        <div class="media align-items-center">
                          <a href="#" class="avatar rounded-circle mr-3">
                            <img
                              alt="Image placeholder"
                              :src="'/storage/' + v_libro.rutaImagen"
                            />
                          </a>
                          <div class="media-body">
                            {{ v_libro.titulo }}
                          </div>
                        </div>
                      </td>
                      <td>{{ v_libro.autor }}</td>
                      <td>{{ v_libro.editorial }}</td>
                      <td>{{ v_libro.genero }}</td>
                      <td>{{ v_libro.isbn }}</td>
                      <td>{{ v_libro.estanteria }}</td>
                      <td>{{ v_libro.estatus }}</td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a
                            class="btn btn-sm btn-icon-only text-light"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                          >
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div
                            class="
                              dropdown-menu
                              dropdown-menu-right
                              dropdown-menu-arrow
                            "
                          >
                            <a
                              class="dropdown-item"
                              href="#"
                              data-toggle="modal"
                              data-target="#modal-form"
                              @click="editarLibro(v_libro)"
                              ><i class="far fa-edit"></i>Editar</a
                            >
                            <a
                              class="dropdown-item"
                              href="#"
                              @click="eliminarLibro(v_libro)"
                              ><i class="fas fa-eraser"></i>Eliminar</a
                            >
                          </div>
                        </div>
                      </td>
                    </tr>
                  </paginate>
                  <tr v-else>
                    <td>No Hay registros</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer py-4">
      <nav aria-label="...">
        <paginate-links
          v-if="lista_libros.length"
          for="vplibros"
          :classes="{
            ul: ['pagination', 'justify-content-end', 'mb-0'],
            li: 'page-item',
            a: ['page-link', 'bg-default', 'border-default'],
          }"
        ></paginate-links>
      </nav>
    </div>
  </div>

  <!--TABLA-->
</template>

<script>
import VuePaginate from "vue-paginate";
import Dialog from "vue-dialog-loading";
Vue.use(Dialog, { dialogBtnColor: "#0f0" });
export default {
  mounted() {
    console.log("Component mounted.");
    this.obtenerLibros();
    this.$loading.show({ delay: 0, background: "rgba(94,114,228,0.5)" });
  },
  data() {
    return {
      libro: {},
      archivo: "",
      v_error: "",
      lista_libros: {},
      editandoLibro: false,
      paginate: ["vplibros"],
    };
  },
  methods: {
    getArchivos(e) {
      this.archivo = e.target.files[0];
    },
    guardarLibro() {
      this.$loading.show({ delay: 0, background: "rgba(94,114,228,0.5)" });

      const datosLibro = new FormData();
      datosLibro.set("titulo", this.libro.titulo);
      datosLibro.set("autor", this.libro.autor);
      datosLibro.set("editorial", this.libro.editorial);
      datosLibro.set("genero", this.libro.genero);
      datosLibro.set("isbn", this.libro.isbn);
      datosLibro.set("estatus", this.libro.estatus);
      datosLibro.set("estanteria", this.libro.estanteria);
      datosLibro.set("archivo", this.archivo);
      if (this.editandoLibro) {
        datosLibro.set("id", this.libro.id);
        axios
          .post("/editarLibro", datosLibro)
          .then((response) => {
            console.log("Libro Editado");
            Swal.fire("Excelente", "Se ha editado", "success");
            this.obtenerLibros();
          })
          .catch((error) => {
            this.v_error = error.response.data.errors;
            var mensaje = Object.values(this.v_error);
            Swal.fire("Oh no!", "Ha ocurrido un problema\n" + mensaje, "error");
            console.log(error.response);
            this.$loading.hide();
          });
        this.editandoLibro = false;
      } else {
        axios
          .post("/guardarLibro", datosLibro)
          .then((response) => {
            console.log("Libro Registrado");
            Swal.fire("Excelente", "Se ha registrado", "success");
            this.obtenerLibros();
          })
          .catch((error) => {
            this.v_error = error.response.data.errors;
            var mensaje = Object.values(this.v_error);
            Swal.fire("Oh no!", "Ha ocurrido un problema\n" + mensaje, "error");
            console.log(error.response);
            this.$loading.hide();
          });
      }
      this.libro = {};
      this.archivo = "";
      document.getElementById("file").value = "";
    },
    obtenerLibros() {
      this.$loading.show({ delay: 0, background: "rgba(94,114,228,0.5)" });
      axios
        .get("/listarLibros")
        .then((response) => {
          this.lista_libros = response.data;
          this.$loading.hide();
        })
        .catch((error) => {
          this.v_error = error.response.data.message;
          console.log(error.response);
          this.$loading.hide();
        });
    },
    editarLibro(idLibro) {
      this.editandoLibro = true;
      this.libro = idLibro;
    },
    eliminarLibro(idLibro) {
      Swal.fire({
        title: "Estas seguro que deseas eliminarlo?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
        cancelButtonText: "No",
      }).then((result) => {
        if (result.isConfirmed) {
          this.$loading.show({ delay: 0, background: "rgba(94,114,228,0.5)" });
          axios
            .delete("/eliminarLibro/" + idLibro.id)
            .then((response) => {
              console.log("Libro Eliminado");
              Swal.fire("Eliminado!", "El libro se ha Eliminado.", "success");
              this.$loading.hide();
            })
            .catch((error) => {
              this.v_error = error.response.data.message;
              Swal.fire("Oh no!", "ha ocurrido un problema", "error");
              console.log(error.response);
              this.$loading.hide();
            });
          this.obtenerLibros();
        }
      });
    },
    nuevoLibro() {
      this.editandoLibro = false;
      this.libro = {};
    },
  },
};
</script>