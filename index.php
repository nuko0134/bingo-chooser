<?php

if(isset($_REQUEST['MAX']) && isset($_REQUEST['SIZE']) && isset($_REQUEST['END_LET'])){
        $MAX = htmlspecialchars($_REQUEST['MAX'], ENT_QUOTES, "UTF-8");
        $SIZE = htmlspecialchars($_REQUEST['SIZE'], ENT_QUOTES, "UTF-8");
        $END_LET = htmlspecialchars($_REQUEST['END_LET'], ENT_QUOTES, "UTF-8");
        $URL = htmlspecialchars($_REQUEST['URL'], ENT_QUOTES, "UTF-8");
        $COLOR = htmlspecialchars($_REQUEST['COLOR'], ENT_QUOTES, "UTF-8");
}
else{
    header("Location: choose.php");
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ビンゴ番号Chooser</title>
</head>
<body background="<?php echo $URL?>">
    <div class="flex1">
        <div class="main">
            <div>
                <p id="count">SRT</p>
            </div>
        </div>
        <button class="button-001" onclick="changeNum();">次！</button>
    </div>
    <div class="flex2">
        <div id="ptags">
            <p id="1"></p>
            <p id="2"></p>
            <p id="3"></p>
            <p id="4"></p>
            <p id="5"></p>
            <p id="6"></p>

        </div>
    </div>
</body>
<audio id="drums_audio">
	    <source src="./audio/drums.mp3" type="audio/mp3">
</audio>
<audio id="jan_audio">
	    <source src="./audio/jan.mp3" type="audio/mp3">
</audio>
<script>
    function put_contents(id,text){
        let target = document.getElementById(id);
        target.innerHTML = text;
    }
    function drums_audio() {
	    document.getElementById('drums_audio').currentTime = 0; //連続クリックに対応
	    document.getElementById('drums_audio').play(); //クリックしたら音を再生
	}

    function jan_audio() {
	    document.getElementById('jan_audio').currentTime = 0; //連続クリックに対応
	    document.getElementById('jan_audio').play(); //クリックしたら音を再生
	}

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    };

    function getHashProperties(a){
        let r = [];
        for(let v in a){
            if(a.hasOwnProperty(v))
            r.push(a[v]);
        }
        return r;
    }

    let max_num = <?php echo $MAX; ?>;
    let target = document.getElementById("count");
    let finished = false;
    let number = 0;

    const used_num = {};

    async function changeNum() {
        if(getHashProperties(used_num).length >= max_num || finished == true){
                rand_num = "<?php echo $END_LET?>";
                finished = true;
                target.innerHTML = "<?php echo $END_LET?>";
        }
        else{
            drums_audio();

            for(let i=0;i<35;i++){
                await sleep(50);
                target.innerHTML = Math.floor(Math.random() * (max_num + 1));
            }

            var rand_num = Math.floor(Math.random() * (max_num + 1));

            while (getHashProperties(used_num).includes(rand_num) || rand_num == 0) {
                rand_num = Math.floor(Math.random() * (max_num + 1));
            }

            used_num[number] = rand_num;

            jan_audio();

            target.innerHTML = rand_num;

            if(number == 0){
                put_contents("1", used_num[number]);
            }
            else if(number == 1){
                put_contents("1", used_num[number]);
                put_contents("2", used_num[number - 1]);
            }
            else if(number == 2){
                put_contents("1", used_num[number]);
                put_contents("2", used_num[number - 1]);
                put_contents("3", used_num[number - 2]);
            }
            else if(number == 3){
                put_contents("1", used_num[number]);
                put_contents("2", used_num[number - 1]);
                put_contents("3", used_num[number - 2]);
                put_contents("4", used_num[number - 3]);
                put_contents("5", used_num[number - 4]);
            }
            else if(number == 4){
                put_contents("1", used_num[number]);
                put_contents("2", used_num[number - 1]);
                put_contents("3", used_num[number - 2]);
                put_contents("4", used_num[number - 3]);
                put_contents("5", used_num[number - 4]);
                put_contents("6", used_num[number - 5]);
            }
            else{
                put_contents("1", used_num[number]);
                put_contents("2", used_num[number - 1]);
                put_contents("3", used_num[number - 2]);
                put_contents("4", used_num[number - 3]);
                put_contents("5", used_num[number - 4]);
                put_contents("6", used_num[number - 5]);
            }
            

            number++;
        }

        
    }
</script>
<style>
    @import url(http://fonts.googleapis.com/earlyaccess/notosansjp.css);
body {
    font-family: 'Noto Sans JP', sans-serif;
    display:flex;
}
.flex1{
    width:90%;
}
.flex2{
    width: 10%;
    text-align: center;
    color: #fff;
    font-size: 80px;
}
.flex2 p{
    -webkit-text-stroke: 3px #000;
    text-stroke: 3px #000;
}
    .main{
        justify-content:center;
        align-items:center;
        width:100%;
        height:90vh; /*高さを指定*/
        display:flex;
    }
    #count{
        text-align: center;
        line-height: 100%;
        font-size:<?php echo $SIZE?>px;
        color: <?php echo $COLOR?>;
    }

    .button-001 {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 250px;
        margin:0 auto;
        padding: .9em 2em;
        border: 1px solid #f30107;
        border-radius: 5px;
        background-color: #fff;
        color: #f30107;
        font-size: 1em;
    }

    .button-001::after {
        transform: rotate(45deg);
        width: 5px;
        height: 5px;
        margin-left: 10px;
        border-top: 2px solid #f30107;
        border-right: 2px solid #f30107;
        content: '';
    }

    body{
        background-size: cover;
        background-repeat: no-repeat;
        
    }
</style>
</html>
