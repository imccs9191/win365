<?php 
namespace VanguardLTE\Games\ZhaoCaiJinBaoJPPT
{
    include('CheckReels.php');
    class Server
    {
        public function get($request, $game, $userId) // changed by game developer
        {
            /*if( config('LicenseDK.APL_INCLUDE_KEY_CONFIG') != 'wi9qydosuimsnls5zoe5q298evkhim0ughx1w16qybs2fhlcpn' ) 
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
            $checked = new \VanguardLTE\Lib\LicenseDK();
            $license_notifications_array = $checked->aplVerifyLicenseDK(null, 0);
            if( $license_notifications_array['notification_case'] != 'notification_license_ok' ) 
            {
                $response = '{"responseEvent":"error","responseType":"error","serverResponse":"Error LicenseDK"}';
                exit( $response );
            }*/
            \DB::beginTransaction();
            // $userId = \Auth::id();// changed by game developer
            if( $userId == null ) 
            {
                $response = '{"responseEvent":"error","responseType":"","serverResponse":"invalid login"}';
                exit( $response );
            }
            $slotSettings = new SlotSettings($game, $userId);
            $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822 = json_decode(trim(file_get_contents('php://input')), true);
            $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 = sprintf('%01.2f', $slotSettings->GetBalance()) * 100;
            $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01 = [];
            if( isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['umid']) ) 
            {
                $umid = $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['umid'];
                if( isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['ID']) && $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['ID'] == 40041 ) 
                {
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"jackpotUpdates":{"drgj":[{"coinSize":400,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '},{"coinSize":300,"jackpot":' . ($slotSettings->slotJackpot[2] * 100) . '},{"coinSize":200,"jackpot":' . ($slotSettings->slotJackpot[1] * 100) . '},{"coinSize":100,"jackpot":' . ($slotSettings->slotJackpot[0] * 100) . '}]}},"ID":40042,"umid":10}';
                }
                else if( isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['ID']) ) 
                {
                    $umid = $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['ID'];
                }
            }
            else
            {
                if( isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['ID']) ) 
                {
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"ID":18}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"deltaBalanceInCents":1},"ID":40085}';
                }
                $umid = 0;
            }
            if( isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['ID']) && $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['ID'] == 41020 && $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusStart') ) 
            {
                $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01 = [];
                if( $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['type'] == 'spin' ) 
                {
                    $_obf_0D39160B0D33353B062C3507331D40271C01101D1E2B01 = '';
                    $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922 = [
                        0, 
                        1, 
                        2, 
                        3, 
                        4, 
                        5, 
                        6, 
                        7, 
                        8, 
                        9
                    ];
                    shuffle($_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922);
                    if( $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] == 0 ) 
                    {
                        $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 = 1;
                    }
                    else if( $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] >= 1 && $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] <= 2 ) 
                    {
                        $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 = 2;
                    }
                    else if( $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] >= 3 && $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] <= 5 ) 
                    {
                        $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 = 3;
                    }
                    else if( $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] >= 6 && $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] <= 9 ) 
                    {
                        $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 = 4;
                    }
                    $_obf_0D051336072A300B3E3B1B1B3F3D03342927281B373132 = $slotSettings->GetGameData($slotSettings->slotId . 'JackWinID');
                    if( $slotSettings->GetGameData('ZhaoCaiJinBaoJPPT_JP' . $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 . 'Cnt') == 2 ) 
                    {
                        $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 = $_obf_0D051336072A300B3E3B1B1B3F3D03342927281B373132 + 1;
                        if( $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 == 1 ) 
                        {
                            $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] = 0;
                        }
                        if( $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 == 2 ) 
                        {
                            $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] = rand(1, 2);
                        }
                        if( $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 == 3 ) 
                        {
                            $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] = rand(3, 5);
                        }
                        if( $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 == 4 ) 
                        {
                            $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] = rand(6, 9);
                        }
                    }
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP' . $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 . 'Cnt', $slotSettings->GetGameData('ZhaoCaiJinBaoJPPT_JP' . $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 . 'Cnt') + 1);
                    $_obf_0D2F362210232735111D2E28162E08075B05221C071011 = 0;
                    if( $slotSettings->GetGameData('ZhaoCaiJinBaoJPPT_JP' . $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 . 'Cnt') >= 3 ) 
                    {
                        $slotSettings->SetBalance($slotSettings->slotJackpot[$_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 - 1]);
                        $_obf_0D39160B0D33353B062C3507331D40271C01101D1E2B01 = ',"winAmount":' . ($slotSettings->slotJackpot[$_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 - 1] * 100);
                        $_obf_0D2F362210232735111D2E28162E08075B05221C071011 = $slotSettings->slotJackpot[$_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 - 1];
                        $slotSettings->ClearJackpot($_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501);
                    }
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"symbol":"","reelStop":' . $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0] . '' . $_obf_0D39160B0D33353B062C3507331D40271C01101D1E2B01 . ',"windowId":"h72Yp3"},"ID":41021,"umid":435}';
                    $rp = json_decode($slotSettings->GetGameData('ZhaoCaiJinBaoJPPTJackReport'));
                    $rp->serverResponse->jackpotSelected[0] = $slotSettings->GetGameData('ZhaoCaiJinBaoJPPT_JP1Cnt');
                    $rp->serverResponse->jackpotSelected[1] = $slotSettings->GetGameData('ZhaoCaiJinBaoJPPT_JP2Cnt');
                    $rp->serverResponse->jackpotSelected[2] = $slotSettings->GetGameData('ZhaoCaiJinBaoJPPT_JP3Cnt');
                    $rp->serverResponse->jackpotSelected[3] = $slotSettings->GetGameData('ZhaoCaiJinBaoJPPT_JP4Cnt');
                    $rp->serverResponse->jackpotReel = $_obf_0D121739210D2E0B0D3928240F2E1717135C215C2F1922[0];
                    $_obf_0D1A27130D24113E132109342438182A38141A213E2332 = json_encode($rp);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTJackReport', $_obf_0D1A27130D24113E132109342438182A38141A213E2332);
                    if( $slotSettings->GetGameData('ZhaoCaiJinBaoJPPT_JP' . $_obf_0D0A320610031E11100C0A2E07131F273D12211D0F3501 . 'Cnt') >= 3 ) 
                    {
                        $slotSettings->SaveLogReport($_obf_0D1A27130D24113E132109342438182A38141A213E2332, 0, 0, $_obf_0D2F362210232735111D2E28162E08075B05221C071011, 'JPG');
                    }
                    else
                    {
                        $slotSettings->SaveLogReport($_obf_0D1A27130D24113E132109342438182A38141A213E2332, 0, 0, $_obf_0D2F362210232735111D2E28162E08075B05221C071011, 'jackpot');
                    }
                }
                if( $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['type'] == 'continue' ) 
                {
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"symbol":2,"reelStop":2,"windowId":"h72Yp3"},"umid":435}';
                }
                $umid = 0;
            }
            if( isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['index']) ) 
            {
                $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01 = [];
                if( $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusStep') == 0 ) 
                {
                    $_obf_0D1D03322B341A3E1C5B123F3E3F320821050D251C1611 = [
                        25, 
                        22, 
                        20, 
                        17, 
                        15, 
                        12, 
                        10, 
                        8, 
                        5, 
                        3, 
                        1, 
                        -1, 
                        -2, 
                        -3, 
                        -4, 
                        -5, 
                        -6, 
                        -7, 
                        -8
                    ];
                    shuffle($_obf_0D1D03322B341A3E1C5B123F3E3F320821050D251C1611);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTBonusOpt', $_obf_0D1D03322B341A3E1C5B123F3E3F320821050D251C1611);
                    $_obf_0D142C241F1B181D2723252601234035375B141A063811 = $_obf_0D1D03322B341A3E1C5B123F3E3F320821050D251C1611[$_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['index']];
                    if( $_obf_0D142C241F1B181D2723252601234035375B141A063811 > 0 ) 
                    {
                        $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTFreeGames', $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTFreeGames') + $_obf_0D142C241F1B181D2723252601234035375B141A063811);
                    }
                    else
                    {
                        $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTFreeMpl', $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTFreeMpl') + ($_obf_0D142C241F1B181D2723252601234035375B141A063811 * -1));
                    }
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"pick":' . $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['index'] . ',"values":[' . $_obf_0D142C241F1B181D2723252601234035375B141A063811 . '],"windowId":"h72Yp3"},"ID":49022,"umid":448}';
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTBonusStep', 1);
                }
                else if( $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusStep') == 1 ) 
                {
                    $_obf_0D1D03322B341A3E1C5B123F3E3F320821050D251C1611 = $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusOpt');
                    $_obf_0D142C241F1B181D2723252601234035375B141A063811 = $_obf_0D1D03322B341A3E1C5B123F3E3F320821050D251C1611[$_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['index']];
                    if( $_obf_0D142C241F1B181D2723252601234035375B141A063811 > 10 ) 
                    {
                        $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTFreeGames', $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTFreeGames') + $_obf_0D142C241F1B181D2723252601234035375B141A063811);
                    }
                    else
                    {
                        $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTFreeMpl', $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTFreeMpl') + ($_obf_0D142C241F1B181D2723252601234035375B141A063811 * -1));
                    }
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"pick":' . $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['index'] . ',"values":[' . $_obf_0D142C241F1B181D2723252601234035375B141A063811 . ',' . $_obf_0D1D03322B341A3E1C5B123F3E3F320821050D251C1611[2] . ',' . $_obf_0D1D03322B341A3E1C5B123F3E3F320821050D251C1611[3] . ',' . $_obf_0D1D03322B341A3E1C5B123F3E3F320821050D251C1611[4] . '],"windowId":"h72Yp3"},"ID":49022,"umid":448}';
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTBonusStep', 2);
                }
                $umid = 0;
            }
            if( isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['spinType']) ) 
            {
                $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01 = [];
                if( $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['spinType'] == 'regular' ) 
                {
                    $umid = '0';
                    $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] = 'bet';
                    $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22 = 1;
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP1Cnt', 0);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP2Cnt', 0);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP3Cnt', 0);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP4Cnt', 0);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTBonusWin', 0);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTFreeGames', 0);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTCurrentFreeGame', 0);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTTotalWin', 0);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTFreeBalance', 0);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTFreeStartWin', 0);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTFreeMpl', $slotSettings->slotFreeMpl);
                }
                else if( $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['spinType'] == 'free' ) 
                {
                    $umid = '0';
                    $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] = 'freespin';
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTCurrentFreeGame', $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTCurrentFreeGame') + 1);
                    $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22 = $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTFreeMpl');
                }
                $_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901 = [];
                $_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[0] = [
                    2, 
                    2, 
                    2, 
                    2, 
                    2
                ];
                $_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[1] = [
                    1, 
                    1, 
                    1, 
                    1, 
                    1
                ];
                $_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[2] = [
                    3, 
                    3, 
                    3, 
                    3, 
                    3
                ];
                $_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[3] = [
                    1, 
                    2, 
                    3, 
                    2, 
                    1
                ];
                $_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[4] = [
                    3, 
                    2, 
                    1, 
                    2, 
                    3
                ];
                $_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[5] = [
                    1, 
                    1, 
                    2, 
                    1, 
                    1
                ];
                $_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[6] = [
                    3, 
                    3, 
                    2, 
                    3, 
                    3
                ];
                $_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[7] = [
                    2, 
                    1, 
                    1, 
                    1, 
                    2
                ];
                $_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[8] = [
                    2, 
                    3, 
                    3, 
                    3, 
                    2
                ];
                $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['bet'] = $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['bet'] / 100;
                for( $i = 0; $i < count($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['lines']); $i++ ) 
                {
                    if( $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['lines'][$i] > 0 ) 
                    {
                        $lines = $i + 1;
                    }
                    else
                    {
                        break;
                    }
                }
                $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 = $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['bet'] / $lines;
                if( $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] == 'bet' || $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] == 'freespin' || $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] == 'respin' ) 
                {
                    if( $lines <= 0 || $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 <= 0.0001 ) 
                    {
                        $response = '{"responseEvent":"error","responseType":"' . $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] . '","serverResponse":"invalid bet state"}';
                        exit( $response );
                    }
                    if( $slotSettings->GetBalance() < ($lines * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832) ) 
                    {
                        $response = '{"responseEvent":"error","responseType":"' . $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] . '","serverResponse":"invalid balance"}';
                        exit( $response );
                    }
                    if( $slotSettings->GetGameData($slotSettings->slotId . 'FreeGames') < $slotSettings->GetGameData($slotSettings->slotId . 'CurrentFreeGame') && $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] == 'freespin' ) 
                    {
                        $response = '{"responseEvent":"error","responseType":"' . $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] . '","serverResponse":"invalid bonus state"}';
                        exit( $response );
                    }
                }
                if( $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] != 'freespin' ) 
                {
                    if( !isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent']) ) 
                    {
                        $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] = 'bet';
                    }
                    $slotSettings->SetBalance(-1 * $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['bet'], $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent']);
                    $_obf_0D1A310E2B25282C1A01072A06330C1A173E3437092622 = $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['bet'] / 100 * $slotSettings->GetPercent();
                    $slotSettings->SetBank((isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent']) ? $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] : ''), $_obf_0D1A310E2B25282C1A01072A06330C1A173E3437092622, $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent']);
                    $_obf_0D262A401E2428360E103910312E0E2A2D04280B345B11 = $slotSettings->UpdateJackpots($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['bet']);
                    $slotSettings->SetGameData($slotSettings->slotId . 'JackWinID', $_obf_0D262A401E2428360E103910312E0E2A2D04280B345B11['isJackId']);
                }
                else
                {
                    $slotSettings->SetGameData($slotSettings->slotId . 'JackWinID', 0);
                }
                $_obf_0D31103E3B3D1E1A27051D1540063B0528291C5C1A0D22 = $slotSettings->GetSpinSettings($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'], $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['bet'], $lines);
                $winType = $_obf_0D31103E3B3D1E1A27051D1540063B0528291C5C1A0D22[0];
                $_obf_0D3B3C113639391705311B0F12323C3B3B250C1A142401 = $_obf_0D31103E3B3D1E1A27051D1540063B0528291C5C1A0D22[1];
                if( isset($_obf_0D262A401E2428360E103910312E0E2A2D04280B345B11) && $_obf_0D262A401E2428360E103910312E0E2A2D04280B345B11['isJackPay'] ) 
                {
                    $winType = 'bonus';
                }
                for( $i = 0; $i <= 2000; $i++ ) 
                {
                    $totalWin = 0;
                    $_obf_0D181C103526150D021B2C0E1A1F211F3F3E2A15363632 = [];
                    $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11 = [
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0, 
                        0
                    ];
                    $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22 = ['0'];
                    $_obf_0D2B2F2802280E223138132C0B310F3C0A2D3328275C22 = '11';
                    $_obf_0D3C090E192F3D26100429351F02123B310C3504040132 = $slotSettings->GetReelStrips($winType, $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent']);
                    for( $k = 0; $k < $lines; $k++ ) 
                    {
                        $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 = '';
                        for( $j = 0; $j < count($slotSettings->SymbolGame); $j++ ) 
                        {
                            $_obf_0D011C142C3C37263F351C4012170A074027083F321132 = $slotSettings->SymbolGame[$j];
                            if( $_obf_0D011C142C3C37263F351C4012170A074027083F321132 == $_obf_0D2B2F2802280E223138132C0B310F3C0A2D3328275C22 || !isset($slotSettings->Paytable['SYM_' . $_obf_0D011C142C3C37263F351C4012170A074027083F321132]) ) 
                            {
                            }
                            else
                            {
                                $s = [];
                                $s[0] = $_obf_0D3C090E192F3D26100429351F02123B310C3504040132['reel1'][$_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][0] - 1];
                                $s[1] = $_obf_0D3C090E192F3D26100429351F02123B310C3504040132['reel2'][$_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][1] - 1];
                                $s[2] = $_obf_0D3C090E192F3D26100429351F02123B310C3504040132['reel3'][$_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][2] - 1];
                                $s[3] = $_obf_0D3C090E192F3D26100429351F02123B310C3504040132['reel4'][$_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][3] - 1];
                                $s[4] = $_obf_0D3C090E192F3D26100429351F02123B310C3504040132['reel5'][$_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][4] - 1];
                                if( $s[4] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) ) 
                                {
                                    $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = 1;
                                    $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 = $slotSettings->Paytable['SYM_' . $_obf_0D011C142C3C37263F351C4012170A074027083F321132][1] * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 * $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 * $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22;
                                    if( $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] < $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 ) 
                                    {
                                        $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] = $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01;
                                        $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 = '{"Count":1,"Line":' . $k . ',"Win":' . $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] . ',"stepWin":' . ($_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] + $totalWin + $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin')) . ',"winReel1":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":["none","none"],"winReel3":["none","none"],"winReel4":["none","none"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( $s[0] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[0], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) ) 
                                {
                                    $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = 1;
                                    $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 = $slotSettings->Paytable['SYM_' . $_obf_0D011C142C3C37263F351C4012170A074027083F321132][1] * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 * $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 * $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22;
                                    if( $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] < $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 ) 
                                    {
                                        $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] = $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01;
                                        $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 = '{"Count":1,"Line":' . $k . ',"Win":' . $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] . ',"stepWin":' . ($_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] + $totalWin + $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin')) . ',"winReel1":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":["none","none"],"winReel3":["none","none"],"winReel4":["none","none"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[0] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[0], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[1] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[1], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) ) 
                                {
                                    $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = 1;
                                    if( in_array($s[0], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[1], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) ) 
                                    {
                                        $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 = $slotSettings->Paytable['SYM_' . $_obf_0D011C142C3C37263F351C4012170A074027083F321132][2] * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 * $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 * $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22;
                                    if( $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] < $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 ) 
                                    {
                                        $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] = $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01;
                                        $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 = '{"Count":2,"Line":' . $k . ',"Win":' . $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] . ',"stepWin":' . ($_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] + $totalWin + $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin')) . ',"winReel1":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":["none","none"],"winReel4":["none","none"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[4] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[3] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[3], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) ) 
                                {
                                    $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = 1;
                                    if( in_array($s[3], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) ) 
                                    {
                                        $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 = $slotSettings->Paytable['SYM_' . $_obf_0D011C142C3C37263F351C4012170A074027083F321132][2] * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 * $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 * $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22;
                                    if( $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] < $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 ) 
                                    {
                                        $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] = $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01;
                                        $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 = '{"Count":2,"Line":' . $k . ',"Win":' . $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] . ',"stepWin":' . ($_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] + $totalWin + $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin')) . ',"winReel1":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":["none","none"],"winReel4":["none","none"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[0] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[0], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[1] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[1], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[2] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[2], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) ) 
                                {
                                    $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = 1;
                                    if( in_array($s[0], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[1], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[2], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) ) 
                                    {
                                        $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 = $slotSettings->Paytable['SYM_' . $_obf_0D011C142C3C37263F351C4012170A074027083F321132][3] * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 * $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 * $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22;
                                    if( $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] < $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 ) 
                                    {
                                        $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] = $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01;
                                        $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 = '{"Count":3,"Line":' . $k . ',"Win":' . $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] . ',"stepWin":' . ($_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] + $totalWin + $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin')) . ',"winReel1":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":["none","none"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[4] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[3] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[3], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[2] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[2], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) ) 
                                {
                                    $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = 1;
                                    if( in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[3], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[2], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) ) 
                                    {
                                        $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 = $slotSettings->Paytable['SYM_' . $_obf_0D011C142C3C37263F351C4012170A074027083F321132][3] * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 * $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 * $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22;
                                    if( $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] < $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 ) 
                                    {
                                        $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] = $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01;
                                        $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 = '{"Count":3,"Line":' . $k . ',"Win":' . $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] . ',"stepWin":' . ($_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] + $totalWin + $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin')) . ',"winReel1":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":["none","none"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[0] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[0], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[1] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[1], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[2] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[2], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[3] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[3], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) ) 
                                {
                                    $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = 1;
                                    if( in_array($s[0], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[1], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[2], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[3], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) ) 
                                    {
                                        $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 = $slotSettings->Paytable['SYM_' . $_obf_0D011C142C3C37263F351C4012170A074027083F321132][4] * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 * $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 * $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22;
                                    if( $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] < $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 ) 
                                    {
                                        $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] = $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01;
                                        $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 = '{"Count":4,"Line":' . $k . ',"Win":' . $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] . ',"stepWin":' . ($_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] + $totalWin + $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin')) . ',"winReel1":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][3] - 1) . ',"' . $s[3] . '"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[4] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[1] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[1], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[2] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[2], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[3] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[3], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) ) 
                                {
                                    $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = 1;
                                    if( in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[1], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[2], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[3], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) ) 
                                    {
                                        $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 = $slotSettings->Paytable['SYM_' . $_obf_0D011C142C3C37263F351C4012170A074027083F321132][4] * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 * $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 * $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22;
                                    if( $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] < $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 ) 
                                    {
                                        $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] = $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01;
                                        $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 = '{"Count":4,"Line":' . $k . ',"Win":' . $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] . ',"stepWin":' . ($_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] + $totalWin + $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin')) . ',"winReel1":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][3] - 1) . ',"' . $s[3] . '"],"winReel5":["none","none"]}';
                                    }
                                }
                                if( ($s[4] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[1] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[1], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[2] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[2], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[3] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[3], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) && ($s[4] == $_obf_0D011C142C3C37263F351C4012170A074027083F321132 || in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22)) ) 
                                {
                                    $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = 1;
                                    if( in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[1], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[2], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[3], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) || in_array($s[4], $_obf_0D09150B2722395B0A39250839035C2C1C053B311C2B22) ) 
                                    {
                                        $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 = $slotSettings->slotWildMpl;
                                    }
                                    $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 = $slotSettings->Paytable['SYM_' . $_obf_0D011C142C3C37263F351C4012170A074027083F321132][5] * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 * $_obf_0D1016073B15193E060D2D0C262328020129171D232A32 * $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22;
                                    if( $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] < $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01 ) 
                                    {
                                        $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] = $_obf_0D0D163F1706133D0A110219022A07303D371E1C0A0F01;
                                        $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 = '{"Count":5,"Line":' . $k . ',"Win":' . $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] . ',"stepWin":' . ($_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] + $totalWin + $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin')) . ',"winReel1":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][0] - 1) . ',"' . $s[0] . '"],"winReel2":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][1] - 1) . ',"' . $s[1] . '"],"winReel3":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][2] - 1) . ',"' . $s[2] . '"],"winReel4":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][3] - 1) . ',"' . $s[3] . '"],"winReel5":[' . ($_obf_0D1F0E07322B28015B3101401931191F0119352A1D0901[$k][4] - 1) . ',"' . $s[4] . '"]}';
                                    }
                                }
                            }
                        }
                        if( $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k] > 0 && $_obf_0D0207283039073919263232090A382F3D26101F0D1E11 != '' ) 
                        {
                            array_push($_obf_0D181C103526150D021B2C0E1A1F211F3F3E2A15363632, $_obf_0D0207283039073919263232090A382F3D26101F0D1E11);
                            $totalWin += $_obf_0D1F171A1F35063716213837072F111B1E0D042E1B1A11[$k];
                        }
                    }
                    $_obf_0D10342528350D243D16293C2835061F263C1C39042811 = 0;
                    $_obf_0D033835123E051D331E010A3C300C332C34021F052801 = '{';
                    $_obf_0D0B230B342E0C0727115B043F283E2137182D312A3D11 = 0;
                    for( $r = 1; $r <= 5; $r++ ) 
                    {
                        $_obf_0D5B3C09162C1E06162134175B0B22135C392940101522 = false;
                        for( $_obf_0D13090C3F3C3624123E1A2C091F31232304270B023B32 = 0; $_obf_0D13090C3F3C3624123E1A2C091F31232304270B023B32 <= 3; $_obf_0D13090C3F3C3624123E1A2C091F31232304270B023B32++ ) 
                        {
                            if( $_obf_0D3C090E192F3D26100429351F02123B310C3504040132['reel' . $r][$_obf_0D13090C3F3C3624123E1A2C091F31232304270B023B32] == $_obf_0D2B2F2802280E223138132C0B310F3C0A2D3328275C22 || $_obf_0D3C090E192F3D26100429351F02123B310C3504040132['reel' . $r][$_obf_0D13090C3F3C3624123E1A2C091F31232304270B023B32] == '0' ) 
                            {
                                $_obf_0D0B230B342E0C0727115B043F283E2137182D312A3D11++;
                                $_obf_0D033835123E051D331E010A3C300C332C34021F052801 .= ('"winReel' . $r . '":[' . $_obf_0D13090C3F3C3624123E1A2C091F31232304270B023B32 . ',"' . $_obf_0D2B2F2802280E223138132C0B310F3C0A2D3328275C22 . '"],');
                                $_obf_0D5B3C09162C1E06162134175B0B22135C392940101522 = true;
                            }
                        }
                        if( !$_obf_0D5B3C09162C1E06162134175B0B22135C392940101522 ) 
                        {
                            break;
                        }
                    }
                    $_obf_0D10342528350D243D16293C2835061F263C1C39042811 = $slotSettings->Paytable['SYM_' . $_obf_0D2B2F2802280E223138132C0B310F3C0A2D3328275C22][$_obf_0D0B230B342E0C0727115B043F283E2137182D312A3D11] * $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 * $lines * $_obf_0D3E1E10392C18192A17311514325C2E132A29390E2E22;
                    if( $_obf_0D0B230B342E0C0727115B043F283E2137182D312A3D11 >= 3 && $slotSettings->slotBonus ) 
                    {
                        $_obf_0D033835123E051D331E010A3C300C332C34021F052801 .= '"scattersType":"bonus",';
                    }
                    else if( $_obf_0D10342528350D243D16293C2835061F263C1C39042811 > 0 ) 
                    {
                        $_obf_0D033835123E051D331E010A3C300C332C34021F052801 .= '"scattersType":"win",';
                    }
                    else
                    {
                        $_obf_0D033835123E051D331E010A3C300C332C34021F052801 .= '"scattersType":"none",';
                    }
                    $_obf_0D033835123E051D331E010A3C300C332C34021F052801 .= ('"scattersWin":' . $_obf_0D10342528350D243D16293C2835061F263C1C39042811 . '}');
                    $totalWin += $_obf_0D10342528350D243D16293C2835061F263C1C39042811;
                    if( $i > 1000 ) 
                    {
                        $winType = 'none';
                    }
                    if( $slotSettings->increaseRTP && $winType == 'win' && $totalWin < ($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['bet'] * rand(2, 5)) ) 
                    {
                    }
                    else if( !$slotSettings->increaseRTP && $winType == 'win' && $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['bet'] < $totalWin ) 
                    {
                    }
                    else
                    {
                        if( $i > 1500 ) 
                        {
                            $response = '{"responseEvent":"error","responseType":"' . $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] . '","serverResponse":"Bad Reel Strip"}';
                            exit( $response );
                        }
                        if( $totalWin <= $_obf_0D3B3C113639391705311B0F12323C3B3B250C1A142401 && $winType == 'bonus' ) 
                        {
                            $_obf_0D163F390C080D0831380D161E12270D0225132B261501 = $slotSettings->GetBank((isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent']) ? $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] : ''));
                            if( $_obf_0D163F390C080D0831380D161E12270D0225132B261501 < $_obf_0D3B3C113639391705311B0F12323C3B3B250C1A142401 ) 
                            {
                                $_obf_0D3B3C113639391705311B0F12323C3B3B250C1A142401 = $_obf_0D163F390C080D0831380D161E12270D0225132B261501;
                            }
                            else
                            {
                                break;
                            }
                        }
                        else if( $totalWin > 0 && $totalWin <= $_obf_0D3B3C113639391705311B0F12323C3B3B250C1A142401 && $winType == 'win' ) 
                        {
                            $_obf_0D163F390C080D0831380D161E12270D0225132B261501 = $slotSettings->GetBank((isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent']) ? $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] : ''));
                            if( $_obf_0D163F390C080D0831380D161E12270D0225132B261501 < $_obf_0D3B3C113639391705311B0F12323C3B3B250C1A142401 ) 
                            {
                                $_obf_0D3B3C113639391705311B0F12323C3B3B250C1A142401 = $_obf_0D163F390C080D0831380D161E12270D0225132B261501;
                            }
                            else
                            {
                                break;
                            }
                        }
                        else if( $totalWin == 0 && $winType == 'none' ) 
                        {
                            break;
                        }
                    }
                }
                if( $totalWin > 0 ) 
                {
                    $slotSettings->SetBank((isset($_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent']) ? $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] : ''), -1 * $totalWin);
                    $slotSettings->SetBalance($totalWin);
                }
                $_obf_0D23292E1910310B2D0F382A090D063F2A132521111C32 = $totalWin;
                if( $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] == 'freespin' ) 
                {
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTBonusWin', $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin') + $totalWin);
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTTotalWin', $totalWin);
                }
                else
                {
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTTotalWin', $totalWin);
                }
                $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTBonusStart', false);
                $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 = sprintf('%01.2f', $slotSettings->GetBalance()) * 100;
                $_obf_0D2C3832163F282A5C100B120D1405400B1F0A131C1201 = 'REGULAR';
                if( $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['spinType'] == 'free' ) 
                {
                    $_obf_0D2C3832163F282A5C100B120D1405400B1F0A131C1201 = 'FREE';
                }
                $_obf_0D5C39151E192A0D0C273E041A211E31150B2201231D01 = 'false';
                $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"credit":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"results":[' . implode(',', $_obf_0D3C090E192F3D26100429351F02123B310C3504040132['rp']) . '],"windowId":"Adbmao"},"ID":40022,"umid":59}';
                $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"deltaBalanceInCents":1},"ID":40085}';
                $jackpotSelected = [
                    0, 
                    0, 
                    0, 
                    0
                ];
                $jackpotReel = 0;
                if( $winType == 'bonus' ) 
                {
                    $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] = 'jackpot';
                    $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTBonusStart', true);
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"state":"start_jackpot_game","windowId":"5Czr6v"},"ID":41021,"umid":40}';
                }
                $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"jackpotUpdates":{"drgj":[{"coinSize":400,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '},{"coinSize":300,"jackpot":' . ($slotSettings->slotJackpot[2] * 100) . '},{"coinSize":200,"jackpot":' . ($slotSettings->slotJackpot[1] * 100) . '},{"coinSize":100,"jackpot":' . ($slotSettings->slotJackpot[0] * 100) . '}]}},"ID":40042,"umid":60}';
                $_obf_0D140A1C122D065B2A1629031B280E272815082A0D2122 = '' . json_encode($_obf_0D3C090E192F3D26100429351F02123B310C3504040132) . '';
                $_obf_0D1B370B073F123C3210300C0336351F3E072217172A22 = '' . json_encode($slotSettings->Jackpots) . '';
                $_obf_0D33120B1B18292D30293B191C3D383E3D2D0C195B2101 = implode(',', $_obf_0D181C103526150D021B2C0E1A1F211F3F3E2A15363632);
                $response = '{"responseEvent":"spin","responseType":"' . $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent'] . '","serverResponse":{"JackWinID":' . $slotSettings->GetGameData($slotSettings->slotId . 'JackWinID') . ',"jackpotReel":0,"jackpotSelected":[' . implode(',', $jackpotSelected) . '],"linesArr":[' . implode(',', $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['lines']) . '],"slotLines":' . $lines . ',"slotBet":' . $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832 . ',"totalFreeGames":' . $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTFreeGames') . ',"currentFreeGames":' . $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTCurrentFreeGame') . ',"Balance":' . $slotSettings->GetBalance() . ',"afterBalance":' . $slotSettings->GetBalance() . ',"bonusWin":' . $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTBonusWin') . ',"FreeMpl":' . $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTFreeMpl') . ',"freeStartWin":' . $slotSettings->GetGameData('ZhaoCaiJinBaoJPPTFreeStartWin') . ',"totalWin":' . $totalWin . ',"winLines":[' . $_obf_0D33120B1B18292D30293B191C3D383E3D2D0C195B2101 . '],"bonusInfo":' . $_obf_0D033835123E051D331E010A3C300C332C34021F052801 . ',"Jackpots":' . $_obf_0D1B370B073F123C3210300C0336351F3E072217172A22 . ',"reelsSymbols":' . $_obf_0D140A1C122D065B2A1629031B280E272815082A0D2122 . '}}';
                $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTJackReport', $response);
                $slotSettings->SaveLogReport($response, $_obf_0D3B5B082B1F0F0235292F01260B303B0F2E32313B0832, $lines, $_obf_0D23292E1910310B2D0F382A090D063F2A132521111C32, $_obf_0D221D1040101E0C18152D38350A220B2431190A3E1822['slotEvent']);
                $response = implode('------', $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01);
                $slotSettings->SaveGameData();
                \DB::commit();
                return $response;
            }
            switch( $umid ) 
            {
                case '31031':
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"urlList":[{"urlType":"mobile_login","url":"https://login.loc/register","priority":1},{"urlType":"mobile_support","url":"https://ww2.loc/support","priority":1},{"urlType":"playerprofile","url":"","priority":1},{"urlType":"playerprofile","url":"","priority":10},{"urlType":"gambling_commission","url":"","priority":1},{"urlType":"cashier","url":"","priority":1},{"urlType":"cashier","url":"","priority":1}]},"ID":100}';
                    break;
                case '10001':
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":2,"balanceInCents":0},"ID":40083,"umid":3}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"deltaBalanceInCents":0},"ID":40083,"umid":4}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"commandId":13218,"params":["0","null"]},"ID":50001,"umid":5}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"token":{"secretKey":"","currency":"USD","balance":0,"loginTime":""},"ID":10002,"umid":7}';
                    break;
                case '40294':
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"nicknameInfo":{"nickname":""},"ID":10022,"umid":8}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"commandId":10713,"params":["0","ba","bj","ct","gc","grel","hb","po","ro","sc","tr"]},"ID":50001,"umid":9}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"jackpotUpdates":{"drgj":[{"coinSize":400,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '},{"coinSize":300,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '},{"coinSize":200,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '},{"coinSize":100,"jackpot":' . ($slotSettings->slotJackpot[3] * 100) . '}]}},"ID":40042,"umid":11}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"commandId":11666,"params":["0","0","0"]},"ID":50001,"umid":11}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"commandId":13981,"params":["0","1"]},"ID":50001,"umid":12}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"commandId":14080,"params":["0","0"]},"ID":50001,"umid":14}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"keyValueCount":5,"elementsPerKey":1,"params":["10","1","11","500","12","1","13","0","14","0"]},"ID":40716,"umid":15}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"deltaBalanceInCents":0},"ID":40083,"umid":16}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"balanceInfo":{"clientType":"casino","totalBalance":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"currency":"' . $slotSettings->slotCurrency . '","balanceChange":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . '},"ID":10006,"umid":17}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{},"ID":40292,"umid":18}';
                    break;
                case '10021':
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"urls":{"casino-cashier-myaccount":[],"regulation_pt_self_exclusion":[],"link_legal_aams":[],"regulation_pt_player_protection":[],"mobile_cashier":[],"mobile_bank":[],"mobile_bonus_terms":[],"mobile_help":[],"link_responsible":[],"cashier":[{"url":"","priority":1},{"url":"","priority":1}],"gambling_commission":[{"url":"","priority":1},{"url":"","priority":1}],"desktop_help":[],"chat_token":[],"mobile_login_error":[],"mobile_error":[],"mobile_login":[{"url":"","priority":1}],"playerprofile":[{"url":"","priority":1},{"url":"","priority":10}],"link_legal_half":[],"ngmdesktop_quick_deposit":[],"external_login_form":[],"mobile_main_promotions":[],"mobile_lobby":[],"mobile_promotion":[],{"url":"","priority":1},{"url":"","priority":10}],"mobile_withdraw":[],"mobile_funds_trans":[],"mobile_quick_deposit":[],"mobile_history":[],"mobile_deposit_limit":[],"minigames_help":[],"link_legal_18":[],"mobile_responsible":[],"mobile_share":[],"mobile_lobby_error":[],"mobile_mobile_comp_points":[],"mobile_support":[{"url":"","priority":1}],"mobile_chat":[],"mobile_logout":[],"mobile_deposit":[],"invite_friend":[]}},"ID":10011,"umid":19}';
                    break;
                case '40066':
                    $_obf_0D34145C302B1D0101103437210F3D3C2D1C3836051D11 = $slotSettings->Bet;
                    for( $i = 0; $i < count($_obf_0D34145C302B1D0101103437210F3D3C2D1C3836051D11); $i++ ) 
                    {
                        $_obf_0D34145C302B1D0101103437210F3D3C2D1C3836051D11[$i] = $_obf_0D34145C302B1D0101103437210F3D3C2D1C3836051D11[$i] * 100;
                    }
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"funNoticeGames":0,"funNoticePayouts":0,"gameGroup":"zcjbjp","minBet":0,"maxBet":0,"minPosBet":0,"maxPosBet":50000,"coinSizes":[' . implode(',', $_obf_0D34145C302B1D0101103437210F3D3C2D1C3836051D11) . ']},"ID":40025,"umid":21}';
                    $slotSettings->SetGameData($slotSettings->slotId . 'BonusWin', 0);
                    $slotSettings->SetGameData($slotSettings->slotId . 'FreeGames', 0);
                    $slotSettings->SetGameData($slotSettings->slotId . 'CurrentFreeGame', 0);
                    $slotSettings->SetGameData($slotSettings->slotId . 'TotalWin', 0);
                    $slotSettings->SetGameData($slotSettings->slotId . 'FreeBalance', 0);
                    $lastEvent = $slotSettings->GetHistory();
                    $slotSettings->SetGameData($slotSettings->slotId . 'brokenGames', '');
                    if( $lastEvent != 'NULL' ) 
                    {
                        $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP1Cnt', $lastEvent->serverResponse->jackpotSelected[0]);
                        $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP2Cnt', $lastEvent->serverResponse->jackpotSelected[1]);
                        $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP3Cnt', $lastEvent->serverResponse->jackpotSelected[2]);
                        $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP4Cnt', $lastEvent->serverResponse->jackpotSelected[3]);
                        $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JPReel', $lastEvent->serverResponse->jackpotReel);
                        $slotSettings->SetGameData($slotSettings->slotId . 'BonusWin', $lastEvent->serverResponse->bonusWin);
                        $slotSettings->SetGameData($slotSettings->slotId . 'FreeStartWin', $lastEvent->serverResponse->freeStartWin);
                        $slotSettings->SetGameData($slotSettings->slotId . 'FreeGames', $lastEvent->serverResponse->totalFreeGames);
                        $slotSettings->SetGameData($slotSettings->slotId . 'CurrentFreeGame', $lastEvent->serverResponse->currentFreeGames);
                        $slotSettings->SetGameData($slotSettings->slotId . 'TotalWin', $lastEvent->serverResponse->totalWin);
                        $slotSettings->SetGameData($slotSettings->slotId . 'FreeBalance', $lastEvent->serverResponse->Balance);
                        $slotSettings->SetGameData($slotSettings->slotId . 'FreeMpl', $lastEvent->serverResponse->FreeMpl);
                        $slotSettings->SetGameData($slotSettings->slotId . 'LinesArr', $lastEvent->serverResponse->linesArr);
                        $slotSettings->SetGameData($slotSettings->slotId . 'Bet', $lastEvent->serverResponse->slotBet);
                        $slotSettings->SetGameData($slotSettings->slotId . 'JackWinID', $lastEvent->serverResponse->JackWinID);
                        if( $lastEvent->responseType == 'jackpot' && $lastEvent->serverResponse->jackpotSelected[0] < 3 && $lastEvent->serverResponse->jackpotSelected[1] < 3 && $lastEvent->serverResponse->jackpotSelected[2] < 3 && $lastEvent->serverResponse->jackpotSelected[3] < 3 ) 
                        {
                            $slotSettings->SetGameData($slotSettings->slotId . 'brokenGames', '"zcjbjp"');
                            $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTJackReport', json_encode($lastEvent));
                        }
                    }
                    break;
                case '40036':
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"brokenGames":[' . $slotSettings->GetGameData($slotSettings->slotId . 'brokenGames') . '],"windowId":"SuJLru"},"ID":40037,"umid":22}';
                    break;
                case '40020':
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":2,"balanceInCents":0},"ID":40085}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":1,"balanceInCents":0},"ID":40085}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"deltaBalanceInCents":0},"ID":40085}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"credit":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"windowId":"SuJLru"},"ID":40026,"umid":28}';
                    break;
                case '40030':
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":2,"balanceInCents":0},"ID":40085}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":1,"balanceInCents":0},"ID":40085}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"typeBalance":0,"currency":"' . $slotSettings->slotCurrency . '","balanceInCents":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"deltaBalanceInCents":0},"ID":40085}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"credit":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"windowId":"SuJLru"},"ID":40026,"umid":28}';
                    if( $slotSettings->GetGameData($slotSettings->slotId . 'brokenGames') != '' ) 
                    {
                        $lastEvent = $slotSettings->GetHistory();
                        $slotSettings->SetGameData($slotSettings->slotId . 'brokenGames', '');
                        if( $lastEvent != 'NULL' ) 
                        {
                            $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP1Cnt', $lastEvent->serverResponse->jackpotSelected[0]);
                            $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP2Cnt', $lastEvent->serverResponse->jackpotSelected[1]);
                            $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP3Cnt', $lastEvent->serverResponse->jackpotSelected[2]);
                            $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JP4Cnt', $lastEvent->serverResponse->jackpotSelected[3]);
                            $slotSettings->SetGameData('ZhaoCaiJinBaoJPPT_JPReel', $lastEvent->serverResponse->jackpotReel);
                            $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTBonusStart', true);
                            $slotSettings->SetGameData($slotSettings->slotId . 'BonusWin', $lastEvent->serverResponse->bonusWin);
                            $slotSettings->SetGameData($slotSettings->slotId . 'FreeStartWin', $lastEvent->serverResponse->freeStartWin);
                            $slotSettings->SetGameData($slotSettings->slotId . 'FreeGames', $lastEvent->serverResponse->totalFreeGames);
                            $slotSettings->SetGameData($slotSettings->slotId . 'CurrentFreeGame', $lastEvent->serverResponse->currentFreeGames);
                            $slotSettings->SetGameData($slotSettings->slotId . 'TotalWin', $lastEvent->serverResponse->totalWin);
                            $slotSettings->SetGameData($slotSettings->slotId . 'FreeBalance', $lastEvent->serverResponse->Balance);
                            $slotSettings->SetGameData($slotSettings->slotId . 'FreeMpl', $lastEvent->serverResponse->FreeMpl);
                            $slotSettings->SetGameData($slotSettings->slotId . 'LinesArr', $lastEvent->serverResponse->linesArr);
                            $slotSettings->SetGameData($slotSettings->slotId . 'Bet', $lastEvent->serverResponse->slotBet);
                        }
                        $_obf_0D0A100E222F353718313B181106313D102F393C3E1732 = '';
                        $slotSettings->SetGameData('ZhaoCaiJinBaoJPPTBonusStart', true);
                        $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"jackpotData":{"lastStop":' . $lastEvent->serverResponse->jackpotReel . ',selectedItems:[' . $lastEvent->serverResponse->jackpotSelected[0] . ',' . $lastEvent->serverResponse->jackpotSelected[1] . ',' . $lastEvent->serverResponse->jackpotSelected[2] . ',' . $lastEvent->serverResponse->jackpotSelected[3] . ']},bonusGameName:"",' . $_obf_0D0A100E222F353718313B181106313D102F393C3E1732 . '"jpWin":100,"reelinfo":[96,93,66,6,22],"windowId":"bVDWxS"},"ID":48676,"umid":29}';
                    }
                    break;
                case '48300':
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"balanceInfo":{"clientType":"casino","totalBalance":' . $_obf_0D1A3E15343531081F13061E15332D2C3B403D0F100901 . ',"currency":"' . $slotSettings->slotCurrency . '","balanceChange":0},"ID":10006,"umid":30}';
                    $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01[] = '3:::{"data":{"waitingLogins":[],"waitingAlerts":[],"waitingDialogs":[],"waitingDialogMessages":[],"waitingToasterMessages":[]},"ID":48301,"umid":31}';
                    break;
            }
            $response = implode('------', $_obf_0D0C042906245B03073E5C11081A210E351540320D2B01);
            $slotSettings->SaveGameData();
            \DB::commit();
            return $response;
        }
    }

}
