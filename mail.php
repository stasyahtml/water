<?php

//$recepient = "n.shatna.kvk@gmail.com";
$recepient = "aleks_kot_@mail.ru";
$sitename = "Water";

$name = isset($_POST["name"])?trim($_POST["name"]):'';
$phone = isset($_POST["phone"])?trim($_POST["phone"]):'';
$action = isset($_POST["action"])?$_POST["action"]:'';

$title = '';
$message = '';
$responce = '';
switch ($action) {
    case "question":
        $title = $sitename.": Индивидуальный питьевой режим";
        $message .= "Имя: ".$name." \n";
        $message .= "Телефон: ".$phone." \n";

        $age = isset($_POST["age"])?$_POST["age"]:false;
        if ($age) {
            $message .= "1. Ваш возраст: ".$age."\n";

            switch ($age) {
                case "до 12":
                    $responce .= '<p>Детям до 12 лет требуется в среднем 0,7-1,2 литра функциональной воды в день в зависимости от возраста и индивидуальных особенностей организма. При этом мальчикам нужно на 10% больше воды, чем девочкам. При занятиях спортом в дни тренировок обычное количество воды увеличиваем в 1,5-2 раза, чтобы компенсировать потоотделение и трату влаги при частом дыхании.</p>';
                    break;
                case "12-16":
                    $responce .= '<p>В возрасте от 12 до 16 лет человеку требуется в среднем 2 литра функциональной воды в сутки. Оптимально пить 70% этого объема в первой половине дня. Начните ваш день со стакана функциональной воды, чтобы запустить обменные процессы организма! При этом рекомендуется не пить много воды за 1 час до сна.</p>';
                    break;
                case "17-50":
                    $responce .= '<p>Взрослому человеку требуется 35-40мл функциональной воды на 1 кг массы тела, причем женщинам нужно больше воды, чем мужчинам. Оптимально пить 70% этого объема в первой половине дня. Начните ваш день со стакана функциональной воды, чтобы запустить обменные процессы организма! При этом лучше не пить много воды за 1 час до сна. После секса рекомендуется выпить дополнительно 0,2-0,4 литра воды, как после хорошей физической нагрузки.</p>';
                    break;
                case "старше 50":
                    $responce .= '<p>Потребность в функциональной воде у людей старше 50 лет составляет 30-35мл на 1кг массы тела. Оптимально пить 70% этого объема в первой половине дня. Начните ваш день со стакана функциональной воды, чтобы запустить обменные процессы организма! При этом рекомендуется не пить много воды за 1 час до сна</p>';
                    break;
            }
        }

        if (isset($_POST["sport"])) {
            $sport = $_POST["sport"];
            $message .= "2. Занимаетесь ли профессиональным или любительским спортом? ".(($sport==1)?'Да':'Нет')."\n";

            if($sport==1) {
                $responce .= '<p>При занятиях фитнесом и активном образе жизни расчет суточной нормы функциональной воды производится исходя из потребляемых продуктов и составляет 1мл воды на 1Ккал суточного рациона.</p>';
            }
        }

        if (isset($_POST["badh"])) {
            $badh = $_POST["badh"];
            $message .= "3. Есть ли у вас вредные привычки (курение, регулярное употребление алкоголя)? ".(($badh==1)?'Да':'Нет')."\n";

            if($badh==1) {
                $responce .= '<p>Если вы курите или регулярно употребляете спиртные напитки, ваша суточная потребность в функциональной воде будет на 50-70% выше среднестатистической нормы.</p>';
            }
        }

        if (isset($_POST["procp"])) {
            $procp = $_POST["procp"];
            $message .= "4. Находитесь ли вы в процессе похудения? ".(($procp==1)?'Да':'Нет')."\n";

            if($procp==1) {
                $responce .= '<p>Для наилучших результатов при похудении пейте дополнительно по 0,2 литра функциональной воды на каждые 20кг массы тела.</p>';
            }
        }

        if (isset($_POST["medical"])) {
            $medical = $_POST["medical"];
            $message .= "5. Принимаете ли вы регулярно медикаментозные препараты? ".(($medical==1)?'Да':'Нет')."\n";

            if($medical==1) {
                $responce .= '<p>Если вы регулярно принимаете медикаменты, для лучшего их усвоения и большего эффекта принимайте на 30-50% больше функциональной воды, чем указано в среднестатистической норме. Также это можно делать в период болезни или при лечении антибиотиками.</p>';
            }
        }

        if (isset($_POST["mom"])) {
            $mom = $_POST["mom"];
            $message .= "6. Вопрос для молодых мам: Кормите ли вы грудью? ".(($mom==1)?'Да':'Нет')."\n";

            if($mom==1) {
                $responce .= '<p>Если вы молодая мама и кормите грудью, вам нужно пить функциональной воды на 50-200% больше нормы. Ввиду большого разброса показателей ориентируйтесь на свое самочувствие – причем если происходят отеки, наилучшим решением будет увеличить норму потребления функциональной воды. Тогда организм перестанет задерживать воду, отеки уйдут, и ваше самочувствие улучшится.</p>';
            }
        }

        break;
    case "order":
        $title =  $sitename.": Заказ «HEALTH WATER»";
        $message .= "Имя: ".$name." \n";
        $message .= "Телефон: ".$phone." \n";
        break;
    case "order_bottle":
        $title =  $sitename.": Заказ «HEALTH WATER»";
        $message .= "Имя: ".$name." \n";
        $message .= "Телефон: ".$phone." \n";

        $bottle = isset($_POST["bottle"])?$_POST["bottle"]:false;
        if ($bottle) {
            $message .= "Бутылка: ".$bottle."л \n";
        }
        
        break;
}
$res = false;
if ($title!='' && $message!='') {
    $res = mail($recepient, $title, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");
}

if ($res) {
    echo json_encode(array('send'=>1, 'responce'=>$responce));
} else {
    echo json_encode(array('send'=>0));
}