<?php

namespace Yandex\Tests\Metrica;

use Guzzle\Http\Message\Response;
use Yandex\Metrica\Management\CountersClient;
use Yandex\Tests\Metrica\Fixtures\Counters;
use Yandex\Tests\TestCase;
use Yandex\Metrica\Management\Models;

class CountersClientTest extends TestCase
{

    public function testGetCounters()
    {
        $fixtures = Counters::$countersFixtures;

        $mock = $this->getMock('Yandex\Metrica\Management\CountersClient', array('sendGetRequest'));
        $mock->expects($this->any())
            ->method('sendGetRequest')
            ->will($this->returnValue($fixtures));

        $response = $mock->getCounters(new Models\CountersParams());

        $this->assertEquals($fixtures["rows"], $response->getRows());

        $counters = $response->getCounters();

        $this->assertEquals($fixtures["counters"][0]["id"], $counters[0]->getId());
        $this->assertEquals($fixtures["counters"][0]["owner_login"], $counters[0]->getOwnerLogin());
        $this->assertEquals($fixtures["counters"][0]["code_status"], $counters[0]->getCodeStatus());
        $this->assertEquals($fixtures["counters"][0]["name"], $counters[0]->getName());
        $this->assertEquals($fixtures["counters"][0]["site"], $counters[0]->getSite());
        $this->assertEquals($fixtures["counters"][0]["type"], $counters[0]->getType());
        $this->assertEquals($fixtures["counters"][0]["favorite"], $counters[0]->getFavorite());
        $this->assertEquals($fixtures["counters"][0]["permission"], $counters[0]->getPermission());
        $this->assertEquals($fixtures["counters"][0]["partner_id"], $counters[0]->getPartnerId());

        $this->assertEquals(
            $fixtures["counters"][0]["webvisor"]["arch_type"],
            $counters[0]->getWebvisor()->getArchType()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["webvisor"]["load_player_type"],
            $counters[0]->getWebvisor()->getLoadPlayerType()
        );

        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["async"],
            $counters[0]->getCodeOptions()->getAsync()
        );

        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["informer"]["enabled"],
            $counters[0]->getCodeOptions()->getInformer()->getEnabled()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["informer"]["type"],
            $counters[0]->getCodeOptions()->getInformer()->getType()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["informer"]["size"],
            $counters[0]->getCodeOptions()->getInformer()->getSize()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["informer"]["indicator"],
            $counters[0]->getCodeOptions()->getInformer()->getIndicator()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["informer"]["color_start"],
            $counters[0]->getCodeOptions()->getInformer()->getColorStart()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["informer"]["color_end"],
            $counters[0]->getCodeOptions()->getInformer()->getColorEnd()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["informer"]["color_text"],
            $counters[0]->getCodeOptions()->getInformer()->getColorText()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["informer"]["color_arrow"],
            $counters[0]->getCodeOptions()->getInformer()->getColorArrow()
        );

        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["visor"],
            $counters[0]->getCodeOptions()->getVisor()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["ut"],
            $counters[0]->getCodeOptions()->getUt()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["track_hash"],
            $counters[0]->getCodeOptions()->getTrackHash()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["xml_site"],
            $counters[0]->getCodeOptions()->getXmlSite()
        );
        $this->assertEquals(
            $fixtures["counters"][0]["code_options"]["in_one_line"],
            $counters[0]->getCodeOptions()->getInOneLine()
        );
    }

    public function testGetCounter()
    {
        $fixtures = Counters::$counterFixtures;

        $mock = $this->getMock('Yandex\Metrica\Management\CountersClient', array('sendGetRequest'));
        $mock->expects($this->any())
            ->method('sendGetRequest')
            ->will($this->returnValue($fixtures));

        $response = $mock->getCounter(2215573, new Models\CounterParams());

        $this->assertEquals($fixtures["counter"]["id"], $response->getId());
        $this->assertEquals($fixtures["counter"]["owner_login"], $response->getOwnerLogin());
        $this->assertEquals($fixtures["counter"]["code_status"], $response->getCodeStatus());
        $this->assertEquals($fixtures["counter"]["name"], $response->getName());
        $this->assertEquals($fixtures["counter"]["site"], $response->getSite());
        $this->assertEquals($fixtures["counter"]["type"], $response->getType());
        $this->assertEquals($fixtures["counter"]["favorite"], $response->getFavorite());
        $this->assertEquals($fixtures["counter"]["permission"], $response->getPermission());

        $this->assertEquals($fixtures["counter"]["webvisor"]["arch_type"], $response->getWebvisor()->getArchType());
        $this->assertEquals(
            $fixtures["counter"]["webvisor"]["load_player_type"],
            $response->getWebvisor()->getLoadPlayerType()
        );

        $this->assertEquals($fixtures["counter"]["code_options"]["async"], $response->getCodeOptions()->getAsync());

        $this->assertEquals(
            $fixtures["counter"]["code_options"]["informer"]["enabled"],
            $response->getCodeOptions()->getInformer()->getEnabled()
        );
        $this->assertEquals(
            $fixtures["counter"]["code_options"]["informer"]["type"],
            $response->getCodeOptions()->getInformer()->getType()
        );
        $this->assertEquals(
            $fixtures["counter"]["code_options"]["informer"]["size"],
            $response->getCodeOptions()->getInformer()->getSize()
        );
        $this->assertEquals(
            $fixtures["counter"]["code_options"]["informer"]["indicator"],
            $response->getCodeOptions()->getInformer()->getIndicator()
        );
        $this->assertEquals(
            $fixtures["counter"]["code_options"]["informer"]["color_start"],
            $response->getCodeOptions()->getInformer()->getColorStart()
        );
        $this->assertEquals(
            $fixtures["counter"]["code_options"]["informer"]["color_end"],
            $response->getCodeOptions()->getInformer()->getColorEnd()
        );
        $this->assertEquals(
            $fixtures["counter"]["code_options"]["informer"]["color_text"],
            $response->getCodeOptions()->getInformer()->getColorText()
        );
        $this->assertEquals(
            $fixtures["counter"]["code_options"]["informer"]["color_arrow"],
            $response->getCodeOptions()->getInformer()->getColorArrow()
        );

        $this->assertEquals($fixtures["counter"]["code_options"]["visor"], $response->getCodeOptions()->getVisor());
        $this->assertEquals($fixtures["counter"]["code_options"]["ut"], $response->getCodeOptions()->getUt());
        $this->assertEquals(
            $fixtures["counter"]["code_options"]["track_hash"],
            $response->getCodeOptions()->getTrackHash()
        );
        $this->assertEquals(
            $fixtures["counter"]["code_options"]["xml_site"],
            $response->getCodeOptions()->getXmlSite()
        );
        $this->assertEquals(
            $fixtures["counter"]["code_options"]["in_one_line"],
            $response->getCodeOptions()->getInOneLine()
        );

        $this->assertEquals($fixtures["counter"]["partner_id"], $response->getPartnerId());
        $this->assertEquals($fixtures["counter"]["code"], $response->getCode());

        $this->assertEquals(
            $fixtures["counter"]["monitoring"]["enable_monitoring"],
            $response->getMonitoring()->getEnableMonitoring()
        );
        $this->assertEquals($fixtures["counter"]["monitoring"]["emails"], $response->getMonitoring()->getEmails());
        $this->assertEquals(
            $fixtures["counter"]["monitoring"]["sms_allowed"],
            $response->getMonitoring()->getSmsAllowed()
        );
        $this->assertEquals(
            $fixtures["counter"]["monitoring"]["enable_sms"],
            $response->getMonitoring()->getEnableSms()
        );
        $this->assertEquals($fixtures["counter"]["monitoring"]["sms_time"], $response->getMonitoring()->getSmsTime());

        $this->assertEquals($fixtures["counter"]["filter_robots"], $response->getFilterRobots());
        $this->assertEquals($fixtures["counter"]["time_zone_name"], $response->getTimeZoneName());
        $this->assertEquals($fixtures["counter"]["visit_threshold"], $response->getVisitThreshold());
        $this->assertEquals($fixtures["counter"]["max_goals"], $response->getMaxGoals());
        $this->assertEquals($fixtures["counter"]["max_detailed_goals"], $response->getMaxDetailedGoals());
        $this->assertEquals($fixtures["counter"]["max_retargeting_goals"], $response->getMaxRetargetingGoals());
    }
}
