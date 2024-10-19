<?php
Const MAX_NUMS = 2;         //Константа порог для цикла for
Const NUM_ALIAS = [         //Ассоциативный массив для замены "магических чисел" в коде
  0 => "первое",
  1 => "второе",
];
$nums = [];                 //Ассоциативный массив для введеных чисел

for($i = 0; $i < MAX_NUMS; ++$i)
{
    fwrite(STDOUT,"Введите " . NUM_ALIAS[$i] . " число: ");
    $nums[NUM_ALIAS[$i]] =  fgets(STDIN);                                   //Чтение введенных данных из потока в массив
    if(!is_numeric($nums[NUM_ALIAS[$i]]))                                          //Провека, ввёл ли пользователь число
    {
        fwrite(STDERR, "Введите, пожалуйста, число!!!" . PHP_EOL);
        $i--;
        continue;
    }
    if(COUNT($nums) == MAX_NUMS && $nums[NUM_ALIAS[$i]] == 0)                             //Проверка второго числа на ноль
    {
        fwrite(STDERR, "Делить на 0 нельзя!". PHP_EOL);
        $i--;
    }
}

$result = "Результат деления " . $nums["первое"] .  "/" . $nums["второе"] . " = "
    . $nums["первое"] / $nums["второе"] . PHP_EOL;
fwrite(STDOUT, $result  );                                                  //Вывод результата