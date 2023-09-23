<?php

namespace Tests\Unit;

use App\Repository\AdvertRepository;
use App\Service\PHPAdventBoardDatabase;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class AdvertRepositoryTest extends TestCase
{
    private AdvertRepository $advertRepository;

    /** @var MockObject  */
    private MockObject $adventBoardDatabase;

    protected function setUp(): void
    {
        $this->adventBoardDatabase = $this->createMock(PHPAdventBoardDatabase::class);
        $this->advertRepository = new AdvertRepository($this->adventBoardDatabase);
    }

    public function testGetRepository(): void
    {
      $result = $this->advertRepository;
      $this->assertInstanceOf(AdvertRepository::class, $result);
    }

}
