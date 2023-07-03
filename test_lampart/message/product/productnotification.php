<?php
function createSuccess($name)
{
  return $message = ['alert' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Create Success Product: ' . $name . '</strong> 
      </div>

      <script>
        $(".alert").alert();
      </script>'];
}

function createFail($name)
{
  return $message = ['alert' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Create Fail Product: ' . $name . '</strong> 
      </div>

      <script>
        $(".alert").alert();
      </script>'];
}

function createEmpty()
{
  return $message = ['alert' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Registration Fields Cannot Be Left Blank</strong> 
      </div>

      <script>
        $(".alert").alert();
      </script>'];
}

function updateSuccess($id)
{
  return $message = ['alert' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Update Success Product ID: ' . $id . '</strong> 
</div>

<script>
  $(".alert").alert();
</script>'];
}

function updateFail($id)
{
  return $message = ['alert' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Update Fail Product ID: ' . $id . '</strong> 
</div>

<script>
  $(".alert").alert();
</script>'];
}

function copySuccess($id)
{
  return $message = ['alert' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Copy Success Product ID: ' . $id . '</strong> 
</div>

<script>
  $(".alert").alert();
</script>'];
}

function copyFail($id)
{
  return $message = ['alert' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong>Copy Fail Product ID: ' . $id . '</strong> 
</div>

<script>
  $(".alert").alert();
</script>'];
}
