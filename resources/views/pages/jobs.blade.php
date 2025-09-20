<x-guest-layout>
      
    <x-filterSearch
        :posts="$posts" 
        :categories="$categories" 
        :locations="$locations" 
        :jobTypes="$jobTypes"  
        :jobTypeCounts="$jobTypeCounts" 
    />

</x-guest-layout>
