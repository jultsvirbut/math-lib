<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Визуальное программирование</title>
    <script type="text/javascript" src="assets/js/jq.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <style type="text/css">
        body { font-family: Arial; font-size: 12px; }
        .create-var-interface { display: none; }
        .delete-table-row { color : red; cursor: pointer; }
        .delete-table-row:hover { text-decoration: underline; }
        .visual-program-table tr td { padding: 5px; margin-right: 5px; }
        .visual-program-table tr { transition: all .3s ease-in-out; }
        .visual-program-table tr:hover { background: #e3e3e3; }
    </style>
    <script type="text/javascript">

        Array.prototype.remove = function(from, to) {
          var rest = this.slice((to || from) + 1 || this.length);
          this.length = from < 0 ? this.length + from : from;
          return this.push.apply(this, rest);
        };

        function countRowsInTable(table){
            return table.find('tr').length;
        }

        function refreshRowNumbers(table){
            var startRow = 1;
            table.find('tr').each(function(){
                $(this).attr('id', startRow);
                startRow++
            })
        }

        $(document).ready(function(){

            var checkedRows = [];
            var createVarInterfaceBlock = $('.create-var-interface');
            var visualProgramBlock = $('.visual-program-block');
            var visualProgramTableBlock = visualProgramBlock.find('.visual-program-table');

            $('.visual-program-table').sortable({
                placeholder: 'row'
            });

            /* ADD ACTION HANDLER */
            $('.add-action').click(function(){

                var selectedAction = $('.choose-action > option:checked').val();

                switch(selectedAction){
                    case 'create_var' :
                        visualProgramTableBlock.find('tbody').append('<tr class="row"><td><input class="check-table-row" type="checkbox"></td><td>'+createVarInterfaceBlock.html()+'</td><td><span class="delete-table-row">удалить</span></td></tr>');
                        countTableRows = visualProgramTableBlock.attr('countrows');
                        visualProgramTableBlock.attr('countrows', ++countTableRows);
                        refreshRowNumbers(visualProgramTableBlock);
                        break;
                    case 0:
                        alert('Выберите действие!');
                        break;
                }

            });
            /* !ADD ACTION HANDLER */

            /* CHECK ROW ACTION HANDLER */
            $('body').on('click', '.check-table-row', function(){

                var rowId = $(this).parents('tr').attr('id');
                var inArrayRowId = $.inArray(rowId, checkedRows);
                console.log("Найден элемент в массиве, его позиция: " + inArrayRowId);

                if($(this).is(':checked')){
                    if(inArrayRowId == -1){
                        checkedRows.push(rowId);
                    }
                }
                else {
                    //delete checkedRows[inArrayRowId];
                    checkedRows.remove(inArrayRowId);
                }

                console.log("Выбранная строка: " + checkedRows);

            });
            /* !CHECK ROW ACTION HANDLER */

            /* DELETE TABLE ROW */
            $('body').on('click', '.delete-table-row', function(){
                if(confirm('Вы действительно хотите удалить строку?'))
                    $(this).parents('tr').remove();
                    refreshRowNumbers(visualProgramTableBlock);
            });
            /* !DELETE TABLE ROW */

        });
    </script>
</head>
<body>

    <div class="form-action">
        <select class="choose-action">
            <option value="0">Выберите действие</option>
            <option value="create_var">Создать переменную</option>
            <option value="operation_plus">Операция сложения +</option>
            <option value="operation_minus">Операция вычитания -</option>
            <option value="operation_division">Операция деления /</option>
        </select>
        <button class="add-action">Добавить действие</button>
    </div>

    <div class="create-var-interface">
        <input class="var-name" type="text" name="var_name">
        <select class="var-type" name="var_type">
            <option value="0">Выберите тип переменной</option>
            <option value="int">Integer</option>
            <option value="float">Float|Double</option>
            <option value="string">String</option>
            <option value="array">Array</option>
        </select> = 
        <input class="var-value" type="text" name="var_value">
    </div>
    
    <div class="visual-program-block">
        <table class="visual-program-table" countrows="0">
            <tbody></tbody>
        </table>
        <button>Выполнить программу</button>
    </div>

</body>
</html>