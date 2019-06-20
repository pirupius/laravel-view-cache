<?php

namespace PiruPius\LaravelViewCache;

trait Cacheable
{
    /**
     * Generate Cache Key for model
     *
     * @return string Class Name / unique id - updated  at timestamp
     */
    public function getCacheKey()
    {
        // Class Name / unique id - updated  at timestamp
        return sprintf(
            "%s/%s-%s",
            get_class($this),
            $this->id,
            $this->updated_at->timestamp
        );
    }
}
