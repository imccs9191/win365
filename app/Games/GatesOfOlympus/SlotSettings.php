<?php 
namespace VanguardLTE\Games\GatesOfOlympus
{
    use Carbon\Carbon;
    class SlotSettings
    {
        public $playerId = null;
        public $splitScreen = null;
        public $reelStrip1_1 = null;
        public $reelStrip1_2 = null;
        public $reelStrip1_3 = null;
        public $reelStrip1_4 = null;
        public $reelStrip1_5 = null;
        public $reelStrip1_6 = null;
        public $reelStrip2_1 = null;
        public $reelStrip2_2 = null;
        public $reelStrip2_3 = null;
        public $reelStrip2_4 = null;
        public $reelStrip2_5 = null;
        public $reelStrip2_6 = null;
        public $reelStrip3_1 = null;
        public $reelStrip3_2 = null;
        public $reelStrip3_3 = null;
        public $reelStrip3_4 = null;
        public $reelStrip3_5 = null;
        public $reelStrip3_6 = null;
        public $reelStrip4_1 = null;
        public $reelStrip4_2 = null;
        public $reelStrip4_3 = null;
        public $reelStrip4_4 = null;
        public $reelStrip4_5 = null;
        public $reelStrip4_6 = null;
        public $reelStrip5_1 = null;
        public $reelStrip5_2 = null;
        public $reelStrip5_3 = null;
        public $reelStrip5_4 = null;
        public $reelStrip5_5 = null;
        public $reelStrip5_6 = null;
        public $reelStrip6_1 = null;
        public $reelStrip6_2 = null;
        public $reelStrip6_3 = null;
        public $reelStrip6_4 = null;
        public $reelStrip6_5 = null;
        public $reelStrip6_6 = null;
        public $reelStrip7_1 = null;
        public $reelStrip7_2 = null;
        public $reelStrip7_3 = null;
        public $reelStrip7_4 = null;
        public $reelStrip7_5 = null;
        public $reelStrip7_6 = null;
        public $reelStrip8_1 = null;
        public $reelStrip8_2 = null;
        public $reelStrip8_3 = null;
        public $reelStrip8_4 = null;
        public $reelStrip8_5 = null;
        public $reelStrip8_6 = null;
        
        public $slotId = '';
        public $slotDBId = '';
        public $Line = null;
        public $scaleMode = null;
        public $numFloat = null;
        public $gameLine = null;
        public $Bet = null;
        public $isBonusStart = null;
        public $Balance = null;
        public $SymbolGame = null;
        public $GambleType = null;
        public $Jackpots = [];
        public $keyController = null;
        public $slotViewState = null;
        public $hideButtons = null;
        public $slotFreeCount = null;
        public $slotFreeMpl = null;
        public $slotWildMpl = null;
        public $slotExitUrl = null;
        public $slotBonus = null;
        public $slotBonusType = null;
        public $slotScatterType = null;
        public $slotGamble = null;
        public $Paytable = [];
        public $slotSounds = [];
        private $jpgs = null;
        private $welcomeBonusLog = null;
        private $Bank = null;
        private $Percent = null;
        private $WinLine = null;
        private $WinGamble = null;
        private $Bonus = null;
        private $shop_id = null;
        public $licenseDK = null;
        public $currency = null;
        public $user = null;
        public $game = null;
        public $shop = null;
        public $credits = null;
        public $freespinCount = [];
        public $doubleWildChance = null;
        public function __construct($sid, $playerId, $credits = null)
        {
           /* if( config('LicenseDK.APL_INCLUDE_KEY_CONFIG') != 'wi9qydosuimsnls5zoe5q298evkhim0ughx1w16qybs2fhlcpn' ) 
            {
                return false;
            }
            if( md5_file(base_path() . '/app/Lib/LicenseDK.php') != '3c5aece202a4218a19ec8c209817a74e' ) 
            {
                return false;
            }
            if( md5_file(base_path() . '/config/LicenseDK.php') != '951a0e23768db0531ff539d246cb99cd' ) 
            {
                return false;
            }
            $this->licenseDK = true;
            $checked = new \VanguardLTE\Lib\LicenseDK();
            $license_notifications_array = $checked->aplVerifyLicenseDK(null, 0);
            if( $license_notifications_array['notification_case'] != 'notification_license_ok' ) 
            {
                $this->licenseDK = false;
            }*/
            $this->slotId = $sid;
            $this->playerId = $playerId;
            $this->credits = $credits;
            $user = \VanguardLTE\User::lockForUpdate()->find($this->playerId);
            $user->balance = $credits != null ? $credits : $user->balance;
            $this->user = $user;
            $this->shop_id = $user->shop_id;
            $game = \VanguardLTE\Game::where([
                'name' => $this->slotId, 
                'shop_id' => $this->shop_id
            ])->lockForUpdate()->first();
            $this->shop = \VanguardLTE\Shop::find($this->shop_id);
            $this->game = $game;
            $this->increaseRTP = rand(0, 1);

            $this->doubleWildChance = 90;

            $this->CurrentDenom = $this->game->denomination;
            $this->scaleMode = 0;
            $this->numFloat = 0;
            $this->Paytable[1] = [0,0,0,0,60,100,2000,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            $this->Paytable[2] = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            $this->Paytable[3] = [0,0,0,0,0,0,0,0,200,200,500,500,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000,1000];
            $this->Paytable[4] = [0,0,0,0,0,0,0,0,50,50,200,200,500,500,500,500,500,500,500,500,500,500,500,500,500,500,500,500,500,500,500];
            $this->Paytable[5] = [0,0,0,0,0,0,0,0,40,40,100,100,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300,300];
            $this->Paytable[6] = [0,0,0,0,0,0,0,0,30,30,40,40,240,240,240,240,240,240,240,240,240,240,240,240,240,240,240,240,240,240,240];
            $this->Paytable[7] = [0,0,0,0,0,0,0,0,20,20,30,30,200,200,200,200,200,200,200,200,200,200,200,200,200,200,200,200,200,200,200];
            $this->Paytable[8] = [0,0,0,0,0,0,0,0,16,16,24,24,160,160,160,160,160,160,160,160,160,160,160,160,160,160,160,160,160,160,160];
            $this->Paytable[9] = [0,0,0,0,0,0,0,0,10,10,20,20,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100];
            $this->Paytable[10] = [0,0,0,0,0,0,0,0,8,8,18,18,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80,80];
            $this->Paytable[11] = [0,0,0,0,0,0,0,0,5,5,15,15,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40];
            $this->Paytable[12] = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            $this->Paytable[13] = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            $this->freespinCount = 15;
            $reel = new GameReel();
            foreach( [
                'reelStrip1_1', 
                'reelStrip1_2', 
                'reelStrip1_3', 
                'reelStrip1_4', 
                'reelStrip1_5', 
                'reelStrip1_6',
                'reelStrip2_1', 
                'reelStrip2_2', 
                'reelStrip2_3', 
                'reelStrip2_4', 
                'reelStrip2_5', 
                'reelStrip2_6',
                'reelStrip3_1', 
                'reelStrip3_2', 
                'reelStrip3_3', 
                'reelStrip3_4', 
                'reelStrip3_5', 
                'reelStrip3_6',
                'reelStrip4_1', 
                'reelStrip4_2', 
                'reelStrip4_3', 
                'reelStrip4_4', 
                'reelStrip4_5', 
                'reelStrip4_6',
                'reelStrip5_1', 
                'reelStrip5_2', 
                'reelStrip5_3', 
                'reelStrip5_4', 
                'reelStrip5_5', 
                'reelStrip5_6',
                'reelStrip6_1', 
                'reelStrip6_2', 
                'reelStrip6_3', 
                'reelStrip6_4', 
                'reelStrip6_5', 
                'reelStrip6_6',
                'reelStrip7_1', 
                'reelStrip7_2', 
                'reelStrip7_3', 
                'reelStrip7_4', 
                'reelStrip7_5', 
                'reelStrip7_6',
                'reelStrip8_1', 
                'reelStrip8_2', 
                'reelStrip8_3', 
                'reelStrip8_4', 
                'reelStrip8_5', 
                'reelStrip8_6'
            ] as $reelStrip ) 
            {
                if( count($reel->reelsStrip[$reelStrip]) ) 
                {
                    $this->$reelStrip = $reel->reelsStrip[$reelStrip];
                }
            }
            $this->slotBonusType = 0;
            $this->slotScatterType = 0;
            $this->splitScreen = false;
            $this->slotBonus = true;
            $this->slotGamble = false;
            $this->slotFastStop = 1;
            $this->slotExitUrl = '/';
            $this->slotWildMpl = 1;
            $this->GambleType = 1;
            $this->slotFreeMpl = 1;
            $this->slotViewState = ($game->slotViewState == '' ? 'Normal' : $game->slotViewState);
            $this->hideButtons = [];
            $this->jpgs = \VanguardLTE\JPG::where('shop_id', $this->shop_id)->lockForUpdate()->get();
            $this->welcomeBonusLog = \VanguardLTE\WelcomePackageLog::where([
                'user_id' => $this->playerId, 
                'game_id' => $this->game->original_id
            ])->whereDate('started_at', Carbon::today())->lockForUpdate()->first();
            $this->Line = [1];
            $this->gameLine = [
                1, 
                2, 
                3, 
                4, 
                5, 
                6, 
                7, 
                8, 
                9, 
                10, 
                11, 
                12, 
                13, 
                14, 
                15,
                16,
                17,
                18,
                19,
                20
            ];
            $this->Bet = explode(',', $game->bet); //[0.01,0.02,0.05,0.10,0.25,0.50,1.00,3.00,5.00]; 
            $this->Balance = $user->balance;
            $this->SymbolGame = [
                '1', 
                '2', 
                '3', 
                '4', 
                '5', 
                '6', 
                '7', 
                '8', 
                '9', 
                '10', 
                '11', 
                '12',
                '13'
            ];
            $this->Bank = $game->get_gamebank();
            $this->Percent = $this->shop->percent;
            $this->WinGamble = $game->rezerv;
            $this->slotDBId = $game->id;
            $this->slotCurrency = $user->shop->currency;
            // if( $user->count_balance == 0 ) 
            // {
            //     $this->Percent = 100;
            //     $this->slotJackPercent = 0;
            //     $this->slotJackPercent0 = 0;
            // }
            if( !isset($this->user->session) || strlen($this->user->session) <= 0 ) 
            {
                $this->user->session = serialize([]);
            }
            $this->gameData = unserialize($this->user->session);
            if( count($this->gameData) > 0 ) 
            {
                foreach( $this->gameData as $key => $vl ) 
                {
                    if( $vl['timelife'] <= time() ) 
                    {
                        unset($this->gameData[$key]);
                    }
                }
            }
        }
        public function SetGameData($key, $value)
        {
            $diffIndex = 86400;
            $this->gameData[$key] = [
                'timelife' => time() + $diffIndex, 
                'payload' => $value
            ];
        }
        public function GetGameData($key)
        {
            if( isset($this->gameData[$key]) ) 
            {
                return $this->gameData[$key]['payload'];
            }
            else
            {
                return 0;
            }
        }
        public function FormatFloat($num)
        {
            $str0 = explode('.', $num);
            if( isset($str0[1]) ) 
            {
                if( strlen($str0[1]) > 4 ) 
                {
                    return round($num * 100) / 100;
                }
                else if( strlen($str0[1]) > 2 ) 
                {
                    return floor($num * 100) / 100;
                }
                else
                {
                    return $num;
                }
            }
            else
            {
                return $num;
            }
        }
        public function SaveGameData()
        {
            $this->user->session = serialize($this->gameData);
            $this->user->save();
            $this->user->refresh();
        }
        public function CheckBonusWin()
        {
            $ratioCount = 0;
            $totalPayRatio = 0;
            foreach( $this->Paytable as $vl ) 
            {
                foreach( $vl as $payRatio ) 
                {
                    if( $payRatio > 0 ) 
                    {
                        $ratioCount++;
                        $totalPayRatio += $payRatio;
                        break;
                    }
                }
            }
            return $totalPayRatio / $ratioCount;
        }
        public function HasGameData($key)
        {
            if( isset($this->gameData[$key]) ) 
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        public function GetBonusFreeSpin(){
            if(isset($this->welcomeBonusLog)){
                if($this->welcomeBonusLog->max_bonus > 0){
                    $this->game->set_gamebank($this->welcomeBonusLog->max_bonus, 'inc', 'bonus');
                    $this->welcomeBonusLog->update(['max_bonus' => 0]);
                    $this->welcomeBonusLog = $this->welcomeBonusLog->refresh();
                }
                return $this->welcomeBonusLog->remain_freespin;
            }else{
                return 0;
            }
        }
        public function SetWelcomeBonus($sum, $slotEvent = ''){
            $wager_time = $this->game->getWagerTime();
            $user = $this->user;
            $user->bonus = $user->bonus + $sum;
            $user->bonus = $this->FormatFloat($user->bonus);
            $user->wager = $user->wager + $sum * $wager_time;
            $user->wager = $this->FormatFloat($user->wager);
            $this->user->save();
            $this->user->refresh();
            $welcomeBonusLog = $this->welcomeBonusLog;
            $welcomeBonusLog->win = $welcomeBonusLog->win + $sum;
            $welcomeBonusLog->win = $this->FormatFloat($welcomeBonusLog->win);
            $welcomeBonusLog->wager = $welcomeBonusLog->wager + $sum * $wager_time;
            $welcomeBonusLog->wager = $this->FormatFloat($welcomeBonusLog->wager);
            $this->welcomeBonusLog->save();
            $this->welcomeBonusLog->refresh();
        }
        public function UpdateBonusFreeSpin(){
            if(isset($this->welcomeBonusLog)){
                $leftFreeSpin = $this->welcomeBonusLog->remain_freespin - 1;
                if($leftFreeSpin < 0){
                    $leftFreeSpin = 0;
                }
                $this->welcomeBonusLog->update(['remain_freespin' => $leftFreeSpin]);
                $this->welcomeBonusLog = $this->welcomeBonusLog->refresh();
                return $leftFreeSpin;
            }else{
                return 0;
            }
        }
        public function GetHistory()
        {
            $history = \VanguardLTE\GameLog::whereRaw('game_id=? and user_id=? ORDER BY id DESC LIMIT 10', [
                $this->slotDBId, 
                $this->playerId
            ])->get();
            $this->lastEvent = 'NULL';
            foreach( $history as $log ) 
            {
                $jsonLog = json_decode($log->str);
                if( $jsonLog->responseEvent != 'gambleResult' ) 
                {
                    $this->lastEvent = $log->str;
                    break;
                }
            }
            if( isset($jsonLog) ) 
            {
                return $jsonLog;
            }
            else
            {
                return 'NULL';
            }
        }
        public function ClearJackpot($jid)
        {
            $game = $this->game;
            $game->{'jp_' . ($jid + 1)} = sprintf('%01.4f', 0);
            $game->save();
        }
        public function UpdateJackpots($bet)
        {
            $bet = $bet * $this->CurrentDenom;
            $count_balance = $this->GetCountBalanceUser();
            $_obf_0D0E13392A1E352D293108251212135B0D022529241422 = [];
            $_obf_0D052A14092A1117372103081A331C2C2622010A2D0C22 = 0;
            for( $i = 0; $i < count($this->jpgs); $i++ ) 
            {
                if( $count_balance == 0 ) 
                {
                    $_obf_0D0E13392A1E352D293108251212135B0D022529241422[$i] = $this->jpgs[$i]->balance;
                }
                else if( $count_balance < $bet ) 
                {
                    $_obf_0D0E13392A1E352D293108251212135B0D022529241422[$i] = $count_balance / 100 * $this->jpgs[$i]->percent + $this->jpgs[$i]->balance;
                }
                else
                {
                    $_obf_0D0E13392A1E352D293108251212135B0D022529241422[$i] = $bet / 100 * $this->jpgs[$i]->percent + $this->jpgs[$i]->balance;
                }
                if( $this->jpgs[$i]->pay_sum < $_obf_0D0E13392A1E352D293108251212135B0D022529241422[$i] && $this->jpgs[$i]->pay_sum > 0 ) 
                {
                    $_obf_0D052A14092A1117372103081A331C2C2622010A2D0C22 = $this->jpgs[$i]->pay_sum / $this->CurrentDenom;
                    $_obf_0D0E13392A1E352D293108251212135B0D022529241422[$i] = $_obf_0D0E13392A1E352D293108251212135B0D022529241422[$i] - $this->jpgs[$i]->pay_sum;
                    $this->SetBalance($this->jpgs[$i]->pay_sum / $this->CurrentDenom);
                    if( $this->jpgs[$i]->pay_sum > 0 ) 
                    {
                        \VanguardLTE\StatGame::create([
                            'user_id' => $this->playerId, 
                            'balance' => $this->Balance * $this->CurrentDenom, 
                            'bet' => 0, 
                            'win' => $this->jpgs[$i]->pay_sum, 
                            'game' => $this->game->name . ' JPG ' . $this->jpgs[$i]->id, 
                            'percent' => 0, 
                            'percent_jps' => 0, 
                            'percent_jpg' => 0, 
                            'profit' => 0, 
                            'shop_id' => $this->shop_id
                        ]);
                    }
                }
                $this->jpgs[$i]->update(['balance' => $_obf_0D0E13392A1E352D293108251212135B0D022529241422[$i]]);
                $this->jpgs[$i] = $this->jpgs[$i]->refresh();
                if( $this->jpgs[$i]->balance < $this->jpgs[$i]->start_balance ) 
                {
                    $summ = $this->jpgs[$i]->start_balance;
                    if( $summ > 0 ) 
                    {
                        $this->jpgs[$i]->add_jps(false, $summ);
                    }
                }
            }
            if( $_obf_0D052A14092A1117372103081A331C2C2622010A2D0C22 > 0 ) 
            {
                $_obf_0D052A14092A1117372103081A331C2C2622010A2D0C22 = sprintf('%01.2f', $_obf_0D052A14092A1117372103081A331C2C2622010A2D0C22);
                $this->Jackpots['jackPay'] = $_obf_0D052A14092A1117372103081A331C2C2622010A2D0C22;
            }
        }
        public function GetBank($slotState = '')
        {
            if( $this->isBonusStart || $slotState == 'bonus' || $slotState == 'freespin' || $slotState == 'respin' ) 
            {
                $slotState = 'bonus';
            }
            else
            {
                $slotState = '';
            }
            $game = $this->game;
            $game->refresh();
            $this->Bank = $game->get_gamebank($slotState);
            return $this->Bank / $this->CurrentDenom;
        }
        public function GetPercent()
        {
            return $this->Percent;
        }
        public function GetCountBalanceUser()
        {
            $this->user->session = serialize($this->gameData);
            $this->user->save();
            $this->user->refresh();
            $this->gameData = unserialize($this->user->session);
            return $this->user->count_balance;
        }
        public function InternalError($errcode)
        {
            $_obf_strlog = '';
            $_obf_strlog .= "\n";
            $_obf_strlog .= ('{"responseEvent":"error","responseType":"' . $errcode . '","serverResponse":"InternalError"}');
            $_obf_strlog .= "\n";
            $_obf_strlog .= ' ############################################### ';
            $_obf_strlog .= "\n";
            $_obf_strinternallog = '';
            if( file_exists(storage_path('logs/') . $this->slotId . 'Internal.log') ) 
            {
                $_obf_strinternallog = file_get_contents(storage_path('logs/') . $this->slotId . 'Internal.log');
            }
            file_put_contents(storage_path('logs/') . $this->slotId . 'Internal.log', $_obf_strinternallog . $_obf_strlog);
            exit( '{"responseEvent":"error","responseType":"' . $errcode . '","serverResponse":"InternalError"}' );
        }
        public function SetBank($slotState = '', $sum, $slotEvent = '')
        {
            if( $this->isBonusStart || $slotState == 'bonus' || $slotState == 'freespin' || $slotState == 'respin' ) 
            {
                $slotState = 'bonus';
            }
            else
            {
                $slotState = '';
            }
            if( $this->GetBank($slotState) + $sum < 0 ) 
            {
                $this->InternalError('Bank_   ' . $sum . '  CurrentBank_ ' . $this->GetBank($slotState) . ' CurrentState_ ' . $slotState);
            }
            $sum = $sum * $this->CurrentDenom;
            $game = $this->game;
            $_obf_bonus_systemmoney = 0;
            if( $sum > 0 && $slotEvent == 'bet' ) 
            {
                $this->toGameBanks = 0;
                $this->toSlotJackBanks = 0;
                $this->toSysJackBanks = 0;
                $this->betProfit = 0;
                $_obf_currentpercent = $this->GetPercent();
                $_obf_bonus_percent = 10;
                $count_balance = $this->GetCountBalanceUser();
                $_allBets = $sum / $this->GetPercent() * 100;
                if( $count_balance < $_allBets && $count_balance > 0 ) 
                {
                    $_subCountBalance = $count_balance;
                    $_obf_diff_money = $_allBets - $_subCountBalance;
                    $_obf_subavaliable_balance = $_subCountBalance / 100 * $this->GetPercent();
                    $sum = $_obf_subavaliable_balance + $_obf_diff_money;
                    $_obf_bonus_systemmoney = $_subCountBalance / 100 * $_obf_bonus_percent;
                }
                else if( $count_balance > 0 ) 
                {
                    $_obf_bonus_systemmoney = $_allBets / 100 * $_obf_bonus_percent;
                }
                for( $i = 0; $i < count($this->jpgs); $i++ ) 
                {
                    if( $count_balance < $_allBets && $count_balance > 0 ) 
                    {
                        $this->toSysJackBanks += ($count_balance / 100 * $this->jpgs[$i]->percent);
                    }
                    else if( $count_balance > 0 ) 
                    {
                        $this->toSysJackBanks += ($_allBets / 100 * $this->jpgs[$i]->percent);
                    }
                }
                $this->toGameBanks = $sum;
                $this->betProfit = $_allBets - $this->toGameBanks - $this->toSlotJackBanks - $this->toSysJackBanks;
            }
            if( $sum > 0 ) 
            {
                $this->toGameBanks = $sum;
            }
            if( $_obf_bonus_systemmoney > 0 ) 
            {
                $sum -= $_obf_bonus_systemmoney;
                $game->set_gamebank($_obf_bonus_systemmoney, 'inc', 'bonus');
            }
            $game->set_gamebank($sum, 'inc', $slotState);
            $game->save();
            return $game;
        }
        public function SetBalance($sum, $slotEvent = '')
        {
            if( $this->GetBalance() + $sum < 0 ) 
            {
                $this->InternalError('Balance_   ' . $sum);
            }
            $sum = $sum * $this->CurrentDenom;
            $user = $this->user;
            if( $sum < 0 && $slotEvent == 'bet' ) 
            {
$user->wager = $user->wager + ($sum * $this->game->getCategoryWagerPercent() / 100);
                $user->wager = $this->FormatFloat($user->wager);
                $user->count_balance = $user->count_balance + $sum;
                $user->count_balance = $this->FormatFloat($user->count_balance);
            }
            $user->balance = $user->balance + $sum;
            $user->balance = $this->FormatFloat($user->balance);
            $this->user->session = serialize($this->gameData);
            $this->user->save();
            $this->user->refresh();
            $this->gameData = unserialize($this->user->session);
            if( $user->balance == 0 ) 
            {
                $user->update([
                    'wager' => 0, 
                    'bonus' => 0
                ]);
            }
            if( $user->wager == 0 ) 
            {
                $user->update(['bonus' => 0]);
            }
            if( $user->wager < 0 ) 
            {
                $user->update([
                    'wager' => 0, 
                    'bonus' => 0
                ]);
            }
            if( $user->count_balance < 0 ) 
            {
                $user->update(['count_balance' => 0]);
            }
            return $user;
        }
        public function GetBalance()
        {
            $this->user->session = serialize($this->gameData);
            $this->user->save();
            $this->user->refresh();
            $this->gameData = unserialize($this->user->session);
            $user = $this->user;
            $this->Balance = $user->balance / $this->CurrentDenom;
            return $this->Balance;
        }
        public function SaveLogReport($spinSymbols, $bet, $lines, $win, $slotState)
        {
            $_obf_slotstate = $this->slotId . ' ' . $slotState;
            if( $slotState == 'freespin' ) 
            {
                $_obf_slotstate = $this->slotId . ' FG';
            }
            else if( $slotState == 'bet' ) 
            {
                $_obf_slotstate = $this->slotId . '';
            }
            else if( $slotState == 'slotGamble' ) 
            {
                $_obf_slotstate = $this->slotId . ' DG';
            }
            $game = $this->game;
            $game->increment('stat_in', $bet * $this->CurrentDenom);
            $game->increment('stat_out', $win * $this->CurrentDenom);
            if( !isset($this->betProfit) ) 
            {
                $this->betProfit = 0;
                $this->toGameBanks = 0;
                $this->toSlotJackBanks = 0;
                $this->toSysJackBanks = 0;
            }
            if( !isset($this->toGameBanks) ) 
            {
                $this->toGameBanks = 0;
            }
            $this->game->increment('bids');
            $this->game->refresh();
            \VanguardLTE\GameLog::create([
                'game_id' => $this->slotDBId, 
                'user_id' => $this->playerId, 
                'ip' => $_SERVER['REMOTE_ADDR'], 
                'str' => $spinSymbols, 
                'shop_id' => $this->shop_id
            ]);
            \VanguardLTE\StatGame::create([
                'user_id' => $this->playerId, 
                'balance' => $this->Balance * $this->CurrentDenom, 
                'bet' => $bet * $this->CurrentDenom, 
                'win' => $win * $this->CurrentDenom, 
                'game' => $_obf_slotstate, 
                'percent' => $this->toGameBanks, 
                'percent_jps' => $this->toSysJackBanks, 
                'percent_jpg' => $this->toSlotJackBanks, 
                'profit' => $this->betProfit, 
                'denomination' => $this->CurrentDenom, 
                'shop_id' => $this->shop_id
            ]);
        }
        public function CheckMultiWild(){
            $percent = rand(0, 100);
            if($percent < 90){
                return 2;
            }else if($percent < 98){
                return 3;
            }else{
                return 5;
            }
        }
        public function GetSpinSettings($garantType = 'doSpin', $bet, $lines)
        {
            $_obf_linecount = 10;
            switch( $lines ) 
            {
                case 10:
                    $_obf_linecount = 10;
                    break;
                case 9:
                case 8:
                    $_obf_linecount = 9;
                    break;
                case 7:
                case 6:
                    $_obf_linecount = 7;
                    break;
                case 5:
                case 4:
                    $_obf_linecount = 5;
                    break;
                case 3:
                case 2:
                    $_obf_linecount = 3;
                    break;
                case 1:
                    $_obf_linecount = 1;
                    break;
                default:
                    $_obf_linecount = 10;
                    break;
            }
            if( $garantType != 'doSpin' &&  $garantType != 'tumbspin') 
            {
                $_obf_granttype = '_bonus';
            }
            else
            {
                $_obf_granttype = '';
            }
            $bonusWin = 0;
            $spinWin = 0;
            $game = $this->game;
            $_obf_grantwin_count = $game->{'garant_win' . $_obf_granttype . $_obf_linecount};
            $_obf_grantbonus_count = $game->{'garant_bonus' . $_obf_granttype . $_obf_linecount};
            $_obf_winbonus_count = $game->{'winbonus' . $_obf_granttype . $_obf_linecount};
            $_obf_winline_count = $game->{'winline' . $_obf_granttype . $_obf_linecount};
            $_obf_grantwin_count++;
            $_obf_grantbonus_count++;
            $return = [
                'none', 
                0
            ];
            if( $_obf_winbonus_count <= $_obf_grantbonus_count ) 
            {
                $bonusWin = 1;
                $_obf_grantbonus_count = 0;
                $game->{'winbonus' . $_obf_granttype . $_obf_linecount} = $this->getNewSpin($game, 0, 1, $lines, $garantType);
            }
            else if( $_obf_winline_count <= $_obf_grantwin_count ) 
            {
                $spinWin = 1;
                $_obf_grantwin_count = 0;
                $game->{'winline' . $_obf_granttype . $_obf_linecount} = $this->getNewSpin($game, 1, 0, $lines, $garantType);
            }
            $game->{'garant_win' . $_obf_granttype . $_obf_linecount} = $_obf_grantwin_count;
            $game->{'garant_bonus' . $_obf_granttype . $_obf_linecount} = $_obf_grantbonus_count;
            $game->save();
            if( $bonusWin == 1 && $this->slotBonus ) 
            {
                $this->isBonusStart = true;
                $garantType = 'bonus';
                $_obf_currentbank = $this->GetBank($garantType);
                $return = [
                    'bonus', 
                    $_obf_currentbank
                ];
                if( $_obf_currentbank < ($this->CheckBonusWin() * $bet) ) 
                {
                    $return = [
                        'none', 
                        0
                    ];
                }
            }
            else if( $spinWin == 1 || $bonusWin == 1 && !$this->slotBonus ) 
            {
                $_obf_currentbank = $this->GetBank($garantType);
                $return = [
                    'win', 
                    $_obf_currentbank
                ];
            }
            if( $garantType == 'bet' && $this->GetBalance() <= (1 / $this->CurrentDenom) ) 
            {
                $_obf_rand = rand(1, 2);
                if( $_obf_rand == 1 ) 
                {
                    $_obf_currentbank = $this->GetBank('');
                    $return = [
                        'win', 
                        $_obf_currentbank
                    ];
                }
            }
            return $return;
        }
        public function getNewSpin($game, $spinWin = 0, $bonusWin = 0, $lines, $garantType = 'doSpin')
        {
            $_obf_linecount = 10;
            switch( $lines ) 
            {
                case 10:
                    $_obf_linecount = 10;
                    break;
                case 9:
                case 8:
                    $_obf_linecount = 9;
                    break;
                case 7:
                case 6:
                    $_obf_linecount = 7;
                    break;
                case 5:
                case 4:
                    $_obf_linecount = 5;
                    break;
                case 3:
                case 2:
                    $_obf_linecount = 3;
                    break;
                case 1:
                    $_obf_linecount = 1;
                    break;
                default:
                    $_obf_linecount = 10;
                    break;
            }
            if( $garantType != 'doSpin' && $garantType != 'tumbspin' ) 
            {
                $_obf_granttype = '_bonus';
            }
            else
            {
                $_obf_granttype = '';
            }
            if( $spinWin ) 
            {
                $win = explode(',', $game->game_win->{'winline' . $_obf_granttype . $_obf_linecount});
            }
            if( $bonusWin ) 
            {
                $win = explode(',', $game->game_win->{'winbonus' . $_obf_granttype . $_obf_linecount});
            }
            $number = rand(0, count($win) - 1);
            return $win[$number];
        }
        public function GetRandomScatterPos($rp)
        {
            $_obf_scatterposes = [];
            for( $i = 0; $i < count($rp); $i++ ) 
            {
                if( $rp[$i] == '1' ) 
                {
                    array_push($_obf_scatterposes, $i);
                    // if( $this->slotReelsConfig[0][2] == 4 ) 
                    // {
                    //     if( isset($rp[$i + 1]) && isset($rp[$i + 2]) && isset($rp[$i + 3]) ) 
                    //     {
                    //         array_push($_obf_scatterposes, $i);
                    //     }
                    //     if( isset($rp[$i - 1]) && isset($rp[$i + 1]) && isset($rp[$i + 2]) ) 
                    //     {
                    //         array_push($_obf_scatterposes, $i - 1);
                    //     }
                    //     if( isset($rp[$i - 2]) && isset($rp[$i - 1]) && isset($rp[$i + 1]) ) 
                    //     {
                    //         array_push($_obf_scatterposes, $i - 2);
                    //     }
                    //     if( isset($rp[$i - 3]) && isset($rp[$i - 2]) && isset($rp[$i - 1]) ) 
                    //     {
                    //         array_push($_obf_scatterposes, $i - 3);
                    //     }
                    // }
                    // else
                    // {
                    //     if( isset($rp[$i + 1]) && isset($rp[$i + 2]) ) 
                    //     {
                    //         array_push($_obf_scatterposes, $i);
                    //     }
                    //     if( isset($rp[$i - 1]) && isset($rp[$i + 1]) ) 
                    //     {
                    //         array_push($_obf_scatterposes, $i - 1);
                    //     }
                    //     if( isset($rp[$i - 2]) && isset($rp[$i - 1]) ) 
                    //     {
                    //         array_push($_obf_scatterposes, $i - 2);
                    //     }
                    // }
                }
            }
            shuffle($_obf_scatterposes);
            if( !isset($_obf_scatterposes[0]) ) 
            {
                $_obf_scatterposes[0] = rand(2, count($rp) - 3);
            }
            return $_obf_scatterposes[0];
        }
        public function GetGambleSettings()
        {
            $spinWin = rand(1, $this->WinGamble);
            return $spinWin;
        }
        public function GetBonusMul(){
            $bonusMuls = [
                [11,11,11,9,9,9,8,8,8,7,6,2,1],
                [2,3,4,5,6,8,10,12,15,20,25,50,100]
            ];
            $percent = rand(0, 100);
            $sum = 0;
            for($i = 0; $i < count($bonusMuls[0]); $i++){
                $sum = $sum + $bonusMuls[0][$i];
                if($percent <= $sum){
                    return $bonusMuls[1][$i];
                }
            }
            return $bonusMuls[1][0];
        }
        public function GenerateFreeSpinCount(){
            $freeSpins = [
                [75, 20, 5],
                [4, 5, 6]
            ];
            $percent = rand(0, 100);
            $sum = 0;
            for($i = 0; $i < count($freeSpins[0]); $i++){
                $sum = $sum + $freeSpins[0][$i];
                if($percent <= $sum){
                    return $freeSpins[1][$i];
                }
            }
            return $freeSpins[1][0];
        }
        public function GetLastReel($lastReel, $lastBinaryReel, $bonusPoses){            
            $reels = [[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0],[0,0,0,0,0]];
            for($i = 0; $i < 30; $i++){
                if($lastBinaryReel[$i] > 0){
                    $lastReel[$i] = -1;
                }
                $reels[floor($i % 6)][$i / 6] = $lastReel[$i];
            }
            for($i = 0; $i < 6; $i++){
                for($j = 4; $j >=1; $j--){
                    if($reels[$i][$j] == -1){
                        $k = 1;
                        while($j >= $k){
                            if($reels[$i][$j -$k] != -1){
                                $reels[$i][$j] = $reels[$i][$j -$k];
                                $reels[$i][$j -$k] = -1;
                                for($bi = 0; $bi < count($bonusPoses); $bi++){
                                    if($bonusPoses[$bi] == ($j -$k) * 6 + $i){
                                        $bonusPoses[$bi] = ($j) * 6 + $i;
                                    }
                                }
                                break;
                            }else{
                                $k++;
                            }
                        }                 
                    }
                }
            }
            return [$reels, $bonusPoses];
        }
        public function GetReelStrips($winType, $slotEvent, $slotReelId)
        {
            $slotReelId = $slotReelId + 1;
            $isScatter = false;
            if( $winType != 'bonus' ) 
            {
                $_obf_reelStripCounts = [];
                foreach( [
                    'reelStrip'.$slotReelId.'_1', 
                    'reelStrip'.$slotReelId.'_2', 
                    'reelStrip'.$slotReelId.'_3', 
                    'reelStrip'.$slotReelId.'_4', 
                    'reelStrip'.$slotReelId.'_5', 
                    'reelStrip'.$slotReelId.'_6'
                ] as $index => $reelStrip ) 
                {
                    if( is_array($this->$reelStrip) && count($this->$reelStrip) > 0 ) 
                    {
                        $_obf_reelStripCounts[$index + 1] = mt_rand(0, count($this->$reelStrip));
                    }
                }
            }
            else
            {
                $_obf_reelStripNumber = [
                    1, 
                    2, 
                    3, 
                    4, 
                    5,
                    6
                ];
                $scattercount = $this->GenerateFreeSpinCount($slotEvent);
                $scatterStripReelNumber = $this->GetRandomNumber(0, 6, $scattercount);
                for( $i = 0; $i < count($_obf_reelStripNumber); $i++ ) 
                {
                    $issame = false;
                    for($j = 0; $j < $scattercount; $j++){
                        if($i == $scatterStripReelNumber[$j]){
                            $issame = true;
                            break;
                        }
                    }
                    if($issame == true){
                        $_obf_reelStripCounts[$_obf_reelStripNumber[$i]] = $this->GetRandomScatterPos($this->{'reelStrip'.$slotReelId .'_'. $_obf_reelStripNumber[$i]});
                        $isScatter = true;
                    }else{
                        $_obf_reelStripCounts[$_obf_reelStripNumber[$i]] = rand(0, count($this->{'reelStrip'.$slotReelId .'_'. $_obf_reelStripNumber[$i]}));
                    }
                }
            }
            
            $reel = [
                'rp' => []
            ];
            foreach( $_obf_reelStripCounts as $index => $value ) 
            {
                $key = $this->{'reelStrip'.$slotReelId . '_' . $index};
                // if($slotEvent=='freespin'){
                //     $key = $this->{'reelStripBonus' . $index};
                // }
                $rc = count($key);
                $key[-1] = $key[$rc - 1];
                $key[$rc] = $key[0];
                $reel['reel' . $index][-1] = $key[$value - 1];
                if($winType == 'win'){
                    $diffNum = rand(1, 1);
                }else{
                    $diffNum = 1;
                }
                
                // $randomPos = $this->GetRandomNumber(0, $rc, 3);
                // $reel['reel' . $index][0] = $key[$randomPos[0]];
                // $reel['reel' . $index][1] = $key[$randomPos[1]];
                // $reel['reel' . $index][2] = $key[$randomPos[2]];
                
                if($isScatter == false){
                    $reel['reel' . $index][0] = $key[$value];
                    $reel['reel' . $index][1] = $key[($value + $diffNum) % $rc];
                    $reel['reel' . $index][2] = $key[($value + 2 * $diffNum) % $rc];
                    $reel['reel' . $index][3] = $key[($value + 3  * $diffNum) % $rc];
                    $reel['reel' . $index][4] = $key[($value + 4  * $diffNum) % $rc];
                }else{
                    $scatterPos = rand(0, 100);
                    if($scatterPos < 20){
                        $scatterPos = 0;
                    }else if($scatterPos < 40){
                        $scatterPos = 1;
                    }else if($scatterPos < 60){
                        $scatterPos = 2;
                    }else if($scatterPos < 80){
                        $scatterPos = 3;
                    }else{
                        $scatterPos = 4;
                    }
                    $reel['reel' . $index][0] = $key[abs($value - $scatterPos * $diffNum) % $rc];
                    $reel['reel' . $index][1] = $key[abs($value + (1 - $scatterPos) * $diffNum) % $rc];
                    $reel['reel' . $index][2] = $key[abs($value + (2 - $scatterPos) * $diffNum) % $rc];
                    $reel['reel' . $index][3] = $key[abs($value + (3 - $scatterPos) * $diffNum) % $rc];
                    $reel['reel' . $index][4] = $key[abs($value + (4 - $scatterPos) * $diffNum) % $rc];
                }
                $reel['reel' . $index][5] = rand(3, 10);
                $reel['rp'][] = $value;
            }
            return $reel;
        }

        public function GetRandomNumber($num_first=0, $num_last=1, $get_cnt=4){
            $random = [];
            $tmp_random = [];
            $ino = 0;
            for($i=$num_first;$i<$num_last;$i++) {
                $tmp_random[$ino] = $i;
                $ino++;
            }
            $tmp_cnt = count($tmp_random);
            $tmp_last = $tmp_cnt - 1;
            for($i=0;$i<$get_cnt;$i++) {
                $tmp_no=mt_rand(0,$tmp_last);
                $random[$i] = $tmp_random[$tmp_no];
                $tno = 0;
                for($j=0;$j<$tmp_cnt;$j++) {
                    if($random[$i] != $tmp_random[$j]) {
                        $tmp_random[$tno] = $tmp_random[$j];               
                        $tno++;
                    }
                }
                $tmp_cnt = $tno;
                $tmp_last = $tmp_cnt - 1;
            }
            return $random;
        }
    }

}
