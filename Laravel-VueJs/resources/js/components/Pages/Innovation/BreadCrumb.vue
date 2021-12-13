<template>
  <div class="bread-crumb">
    <div class="container-outer">
      <b-container>
        <nav aria-label="breadcrumb">
            <MDBBreadcrumb>
                <MDBBreadcrumbItem active><a class="text-dark" href="/cars-home">Home</a></MDBBreadcrumbItem>
                <MDBBreadcrumbItem ><a href="/innovation">Innovation</a></MDBBreadcrumbItem>
            </MDBBreadcrumb>
        </nav>
      </b-container>
    </div>
  </div>
</template>

<script>
import { MDBBreadcrumb, MDBBreadcrumbItem } from 'mdb-vue-ui-kit';
export default {
  name: "BreadCrumb",
  components: {
    MDBBreadcrumb,
    MDBBreadcrumbItem
  },
};
</script>

<style scoped>

.container-outer {
  margin: 0 auto;
  max-width: 1680px;
  width: 100%;
}
.bread-crumb .container-outer {
  padding: 24px 0;
}
/*css bread crumb*/
.breadcrumb{
    background: none;
}
/**end css bread crumb */
</style>
