<x-guest-layout>
  
    <x-filterSearch
        :posts="$posts" 
        :categories="$categories" 
        :locations="$locations" 
        :jobTypes="$jobTypes" 
        :skills="$skills" 
        :jobTypeCounts="$jobTypeCounts" 
    />

</x-guest-layout>
