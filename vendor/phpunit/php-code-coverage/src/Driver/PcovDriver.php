<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-code-coverage.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeCoverage\Driver;

<<<<<<< HEAD
use const pcov\inclusive;
use function array_intersect;
use function extension_loaded;
use function pcov\clear;
use function pcov\collect;
use function pcov\start;
use function pcov\stop;
use function pcov\waiting;
=======
use function extension_loaded;
>>>>>>> origin/2-php-202109/2-groups/2-B/4-23-Thang
use function phpversion;
use SebastianBergmann\CodeCoverage\Filter;
use SebastianBergmann\CodeCoverage\RawCodeCoverageData;

/**
 * @internal This class is not covered by the backward compatibility promise for phpunit/php-code-coverage
 */
final class PcovDriver extends Driver
{
    /**
     * @var Filter
     */
    private $filter;

    /**
     * @throws PcovNotAvailableException
     */
    public function __construct(Filter $filter)
    {
        if (!extension_loaded('pcov')) {
            throw new PcovNotAvailableException;
        }

        $this->filter = $filter;
    }

    public function start(): void
    {
<<<<<<< HEAD
        start();
=======
        \pcov\start();
>>>>>>> origin/2-php-202109/2-groups/2-B/4-23-Thang
    }

    public function stop(): RawCodeCoverageData
    {
<<<<<<< HEAD
        stop();

        $filesToCollectCoverageFor = waiting();
        $collected                 = [];

        if ($filesToCollectCoverageFor) {
            if (!$this->filter->isEmpty()) {
                $filesToCollectCoverageFor = array_intersect($filesToCollectCoverageFor, $this->filter->files());
            }

            $collected = collect(inclusive, $filesToCollectCoverageFor);

            clear();
        }

        return RawCodeCoverageData::fromXdebugWithoutPathCoverage($collected);
=======
        \pcov\stop();

        $collect = \pcov\collect(
            \pcov\inclusive,
            !$this->filter->isEmpty() ? $this->filter->files() : \pcov\waiting()
        );

        \pcov\clear();

        return RawCodeCoverageData::fromXdebugWithoutPathCoverage($collect);
>>>>>>> origin/2-php-202109/2-groups/2-B/4-23-Thang
    }

    public function nameAndVersion(): string
    {
        return 'PCOV ' . phpversion('pcov');
    }
}
