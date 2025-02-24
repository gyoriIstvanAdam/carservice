<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self regisztralt()
 * @method static self kotelezo_szerviz()
 * @method static self javithatatlan()
 * @method static self kiregisztralt()
 * @method static self visszahivasrol_ertesitve()
 * @method static self visszahivasra_idopontot_kert()
 * @method static self visszahivasra_idopontot_modositott()
 * @method static self visszahivasra_jelentkezett()
 * @method static self kotelezo_szervizre_felszolitva()
 * @method static self kotelezo_szervizre_2szor_felszolitva()
 * @method static self kotelezo_szervizre_idopontot_kert()
 * @method static self kotelezo_szervizre_megjelent()
 * @method static self meghibasodas()
 * @method static self javitas_megkezdve()
 * @method static self javitas_elkeszult()
 * @method static self kotelezo_szervizre_idopontot_modositott()
 */
final class EventEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'regisztralt' => 'regisztralt',
            'kotelezo_szerviz' => 'kotelezo_szerviz',
            'javithatatlan' => 'javithatatlan',
            'kiregisztralt' => 'kiregisztralt',
            'visszahivasrol_ertesitve' => 'visszahivasrol_ertesitve',
            'visszahivasra_idopontot_kert' => 'visszahivasra_idopontot_kert',
            'visszahivasra_idopontot_modositott' => 'visszahivasra_idopontot_modositott',
            'visszahivasra_jelentkezett' => 'visszahivasra_jelentkezett',
            'kotelezo_szervizre_felszolitva' => 'kotelezo_szervizre_felszolitva',
            'kotelezo_szervizre_2szor_felszolitva' => 'kotelezo_szervizre_2szor_felszolitva',
            'kotelezo_szervizre_idopontot_kert' => 'kotelezo_szervizre_idopontot_kert',
            'kotelezo_szervizre_megjelent' => 'kotelezo_szervizre_megjelent',
            'meghibasodas' => 'meghibasodas',
            'javitas_megkezdve' => 'javitas_megkezdve',
            'javitas_elkeszult' => 'javitas_elkeszult',
            'kotelezo_szervizre_idopontot_modositott' => 'kotelezo_szervizre_idopontot_modositott',
        ];
    }

    protected static function labels(): array
    {
        return [
            'regisztralt' => 'Regisztrált',
            'kotelezo_szerviz' => 'Kötelező szerviz',
            'javithatatlan' => 'Javíthatatlan',
            'kiregisztralt' => 'Kiregisztrált',
            'visszahivasrol_ertesitve' => 'Visszahívásról értesítve',
            'visszahivasra_idopontot_kert' => 'Visszahívásra időpontot kért',
            'visszahivasra_idopontot_modositott' => 'Visszahívásra időpontot módosított',
            'visszahivasra_jelentkezett' => 'Visszahívásra jelentkezett',
            'kotelezo_szervizre_felszolitva' => 'Kötelező szervizre felszólítva',
            'kotelezo_szervizre_2szor_felszolitva' => 'Kötelező szervizre 2-szor felszólítva',
            'kotelezo_szervizre_idopontot_kert' => 'Kötelező szervizre időpontot kért',
            'kotelezo_szervizre_megjelent' => 'Kötelező szervizre megjelent',
            'meghibasodas' => 'Meghibásodás',
            'javitas_megkezdve' => 'Javítás megkezdve',
            'javitas_elkeszult' => 'Javítás elkészült',
            'kotelezo_szervizre_idopontot_modositott' => 'Kötelező szervizre időpontot módosított',
        ];
    }
}