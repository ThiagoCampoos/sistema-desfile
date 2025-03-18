
const estados = [
    { sigla: "AC", nome: "Acre" },
    { sigla: "AL", nome: "Alagoas" },
    { sigla: "AP", nome: "Amapá" },
    { sigla: "AM", nome: "Amazonas" },
    { sigla: "BA", nome: "Bahia" },
    { sigla: "CE", nome: "Ceará" },
    { sigla: "DF", nome: "Distrito Federal" },
    { sigla: "ES", nome: "Espírito Santo" },
    { sigla: "GO", nome: "Goiás" },
    { sigla: "MA", nome: "Maranhão" },
    { sigla: "MT", nome: "Mato Grosso" },
    { sigla: "MS", nome: "Mato Grosso do Sul" },
    { sigla: "MG", nome: "Minas Gerais" },
    { sigla: "PA", nome: "Pará" },
    { sigla: "PB", nome: "Paraíba" },
    { sigla: "PR", nome: "Paraná" },
    { sigla: "PE", nome: "Pernambuco" },
    { sigla: "PI", nome: "Piauí" },
    { sigla: "RJ", nome: "Rio de Janeiro" },
    { sigla: "RN", nome: "Rio Grande do Norte" },
    { sigla: "RS", nome: "Rio Grande do Sul" },
    { sigla: "RO", nome: "Rondônia" },
    { sigla: "RR", nome: "Roraima" },
    { sigla: "SC", nome: "Santa Catarina" },
    { sigla: "SP", nome: "São Paulo" },
    { sigla: "SE", nome: "Sergipe" },
    { sigla: "TO", nome: "Tocantins" }
];

document.querySelectorAll('.estado-select').forEach(select => {
    estados.forEach(estado => {
        const option = document.createElement('option');
        option.value = estado.sigla;
        option.textContent = estado.nome;
        select.appendChild(option);
    });
});


$(document).ready(function() {
    $('#modalMostrarCliente').on('show.bs.modal', function () {
        $('.estado-select').prop('disabled', true);
    });

    $('#modalMostrarCliente').on('hide.bs.modal', function () {
        $('.estado-select').prop('disabled', false);
    });
});




$('#modalCadastrarUsuario').on('shown.bs.modal', function () {
  $('#select2-3').select2({
    width: '100%', // Opcional: garante que o Select2 ocupe a largura total
    dropdownParent: $('#modalCadastrarUsuario') // Certifique-se de que o dropdown esteja dentro do modal
  });
});

$('#modalEditarUsuario').on('shown.bs.modal', function () {
  $('.form-acesso').select2({
    width: '100%', // Opcional: garante que o Select2 ocupe a largura total
    dropdownParent: $('#modalEditarUsuario') // Certifique-se de que o dropdown esteja dentro do modal
  });
});



$(document).ready(function() {
    $('#datepicker').datepicker({
      // Outras configurações do datepicker
      container: '#modalCadastrarUsuario' ,
      format: 'dd/mm/yyyy'
    });
});

$(document).ready(function() {
    $('#datepicker_editar').datepicker({
      // Outras configurações do datepicker
      container: '#modalEditarUsuario' ,
      format: 'dd/mm/yyyy'
    });
});

$(document).ready(function() {
    $('#data_nascimento_fisica').datepicker({
      container: '#pessoa-fisica',
      format: 'dd/mm/yyyy'
    });
  });

  $(document).ready(function() {
    $('#data_fundacao_juridica').datepicker({
      container: '#pessoa-juridica',
      format: 'dd/mm/yyyy'
    });
  });

  $(document).ready(function() {
    $('#data_nascimento_fisica_ed').datepicker({
      container: '#modalEditCliente',
      format: 'dd/mm/yyyy'
    });
  });

  $(document).ready(function() {
    $('#data_fundacao_juridica_ed').datepicker({
      container: '#modalEditCliente',
      format: 'dd/mm/yyyy'
    });
  });

  $(document).ready(function(){
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',   // Define o formato da data
        autoclose: true,        // Fecha automaticamente o calendário após a seleção
        todayHighlight: true    // Destaca a data atual no calendário
    });
  });


  $(document).ready(function() {
    $('.tox-promotion').hide(); 
    $('.tox-promotion-link').hide(); 
    $('.tox-statusbar__path').hide(); 
    $('.tox-statusbar__path-item').hide(); 
    $('.tox-statusbar').hide(); 
    $('.tox-statusbar__branding').hide(); 

    
    $('.tox-statusbar__text-container').hide(); 
  });

 /* $(document).ready(function(){
    var modal = document.getElementById('modalMostrarRevisional');
  var chartContainer = document.getElementById('chart-container'); 
  var chart = document.getElementById('pattern_chart'); 
  var originalParent = chart.parentNode;

  modal.addEventListener('shown.bs.modal', function () {
    chartContainer.appendChild(chart); 
    chart.style.display = 'block';
  });

  modal.addEventListener('hidden.bs.modal', function () {
    chart.style.display = 'none'; 
    originalParent.appendChild(chart);
  });
  });*/

  document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleForm");
    const formContainer = document.getElementById("formContainer");
    const clientTable = document.getElementById("clientTable");
    const cancelButton = document.getElementById("cancelForm");

    toggleButton.addEventListener("click", function () {
        formContainer.style.display = "block";
        clientTable.style.display = "none";
    });

    cancelButton.addEventListener("click", function () {
        formContainer.style.display = "none";
        clientTable.style.display = "table";
    });
});
  

