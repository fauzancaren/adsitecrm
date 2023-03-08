<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\AdExchangeBuyerII;

class InventorySizeTargeting extends \Google\Collection
{
  protected $collection_key = 'targetedInventorySizes';
  protected $excludedInventorySizesType = AdSize::class;
  protected $excludedInventorySizesDataType = 'array';
  public $excludedInventorySizes = [];
  protected $targetedInventorySizesType = AdSize::class;
  protected $targetedInventorySizesDataType = 'array';
  public $targetedInventorySizes = [];

  /**
   * @param AdSize[]
   */
  public function setExcludedInventorySizes($excludedInventorySizes)
  {
    $this->excludedInventorySizes = $excludedInventorySizes;
  }
  /**
   * @return AdSize[]
   */
  public function getExcludedInventorySizes()
  {
    return $this->excludedInventorySizes;
  }
  /**
   * @param AdSize[]
   */
  public function setTargetedInventorySizes($targetedInventorySizes)
  {
    $this->targetedInventorySizes = $targetedInventorySizes;
  }
  /**
   * @return AdSize[]
   */
  public function getTargetedInventorySizes()
  {
    return $this->targetedInventorySizes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InventorySizeTargeting::class, 'Google_Service_AdExchangeBuyerII_InventorySizeTargeting');
